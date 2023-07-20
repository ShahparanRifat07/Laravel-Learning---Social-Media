<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function register(Request $request){
        if($request->isMethod('post')){
            $incomming_fields = $request->validate([
                'name' => ['required','min:3','max:30'],
                'email' => ['email','required', Rule::unique('users','email')],
                'password' => ['required','min:6','max:100'],
            ]);

            $user = new User();
            $user->name = $incomming_fields['name'];
            $user->email = $incomming_fields['email'];
            $user->password = $incomming_fields['password'];

            // $incomming_fields['password'] = bcrypt($incomming_fields['password']);
            // User::create($incomming_fields);

            $user->password = bcrypt($user->password);
            $user->save();
            auth()->login($user);

            return redirect('/');
        }
        if($request->isMethod('get')){
            return view('register');
        }
    }


    public function login(Request $request){
        if($request->isMethod('post')){
            $incoming_fields = $request->validate([
                "email" => ['required'],
                "password" => ['required','min:6','max:100'],
            ]);

            if(auth()->attempt(['email' =>$incoming_fields['email'],'password'=>$incoming_fields['password']])){
                $request->session()->regenerate();
                return redirect('/');
            }else{
                return redirect('login');
            }
        }
        if($request->isMethod('get')){
            return view('login');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}

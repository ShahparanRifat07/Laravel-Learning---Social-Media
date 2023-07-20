<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('home',['posts'=>$posts]);
    }

    public function detail($id){
        $post = Post::where('id',$id)->first();
        if ($post === null) {
            abort(404);
        }
        return view('post.detail',['post'=>$post]);
    }
    


    public function create(Request $request){
        if($request->isMethod('post')){
            $incomming_fields = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
    
            $post = new Post();
            $post->title = strip_tags($incomming_fields['title']);
            $post->content = strip_tags($incomming_fields['content']);
            $post->user_id = auth()->user()->id;
    
            $post->save();

            return redirect('/');
        }
        if($request->isMethod('get')){
            return view('post.create');
        }    
    }


    public function edit(Request $request,Post $post_id){
        if($request->isMethod('patch')){
            if(auth()->user()->id === $post_id->user->id){
                $incomming_fields = $request->validate([
                    'title' => ['required'],
                    'content' => ['required'],
                ]);

                $post_id->title = $incomming_fields['title'];
                $post_id->content = $incomming_fields['content'];
                $post_id->update();

                return redirect(route('post-detail',$post_id->id));  
            }else{
                return redirect('/');
            }
            
        }
        if($request->isMethod('get')){
            if(auth()->user()->id === $post_id->user->id){
                return view('post.edit',['post'=>$post_id]);
            }else{
                return redirect('/');
            }
            
        }    
    }


    public function delete(Request $request, Post $post){
        if($request->isMethod('delete')){
            if(auth()->user()->id === $post->user->id){
                $post->delete(); 
                return redirect('/');
            }else{
                return redirect('/');
            }
        }
    }
}

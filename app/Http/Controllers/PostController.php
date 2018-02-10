<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 21/10/17
 * Time: 3:01 AM
 */


namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller{

    public function getDashboard(){
        $posts=Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts'=>$posts]);
    }

    public function getTemp(){
        return view('temp');
    }


    public function postCreatePost(Request $request){
//        validation
        $this -> validate($request, [
            'body' => 'required|max:1000'
        ]);


        $post=new Post();
        $post->body=$request['body'];
        $msg='There was an error!';
        if ($request->user()->posts()->save($post)){
            $msg='Post successfully created!';
        }
//        $request->user()->posts()->save($post);
        return redirect()->route('dashboard')->with(['msg'=>$msg]);

    }

    public function getDeletePost($post_id){
        $post=Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['msg'=>'Successfully deleted!']);
    }

//    editpost fun
    public function postEditPost(Request $request){
        $this->validate($request, [
            'body'=>'required'
        ]);
        $post=Post::find($request['postID']);
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->body=$request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body], 200);
    }


}

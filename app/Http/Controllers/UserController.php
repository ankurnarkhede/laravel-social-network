<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 19/10/17
 * Time: 9:56 AM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{


    public function postSignUp(Request $request){

        $this -> validate($request, [
            'email' => 'required|unique:users|email',
            'name' => 'required|max:15',
            'password'=> 'required|min:4'
        ]);

        $email=$request['email'];
        $name=$request['name'];
        $password=bcrypt($request['password']);
        $status=1;


        $user = new User();
        $user->email=$email;
        $user->name=$name;
        $user->password=$password;
        $user->status=$status;

        $user->save();

        Auth::login($user);
        return redirect()->route('dashboard');


    }


    public function postSignIn(Request $request){

        $this -> validate($request, [
            'email' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt(['email'=> $request['email'], 'password'=> $request['password']])){
            return redirect()->route('dashboard');

        }
        return redirect()->back();
//        return redirect()->route('temp');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');

    }

    public function getAccount(){
        return view('account', ['user'=>Auth::user()]);
    }

    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'name'=> 'required|max:120'
        ]);

        $user=Auth::user();
        $user->name=$request['name'];
        $user->update();
        $file=$request->file('image');
        $filename=$request['name'].'-'.$user->id.'.jpg';
        if ($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');


    }

    public function getUserImage($filename){
        $file=Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }




}
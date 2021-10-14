<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function login() {

        return view("auth.login");
    }

    public function logout() {

        if(session()->has('loginid')){
            session()->flush();
            return redirect()->route('login');
        }

    }

    public function register() {

        return view("auth.register");
    }

    public function registerUser(Request $request) {

        $request->validate([
            'userName'=>'required|unique:users,user_name',
            'userPassword'=>'required',
            'userType'=>'required',
        ]);
        $user = new User();
        $user->user_name = $request->userName;
        $user->password = Hash::make($request->userPassword);
        $user->sex = $request->usersex;
        $user->tell = $request->usermnumber;
        $user->user_type = $request->userType;
        $res = $user->save();
        if($res){
            return back()->with('success','you have Successfully regiter');
        }else{
            return back()->with('fail','Somthing is wrong');
        }
    }

    public function loginUser(Request $request) {

        $request->validate([
            'userName'=>'required',
            'userPassword'=>'required',
        ]);
        $user = User::where('user_name','=',$request->userName)->first();
        if($user){
            if(Hash::check($request->userPassword,$user->password)){
                $request->session()->put('loginid',$user->user_id);
                $request->session()->put('userType',$user->user_type);
                return redirect('dashbord');
            }else{
                return back()->with('fail','Password is wrong');
            }
        }else{
            return back()->with('fail','User name is wrong');
        }
    }

    public function dashbord(){
        $data = array();
        $data1 = session()->get('userType');
        if(session()->has('loginid')){
            $data = User::where('user_id','=',session()->get('loginid'))->first();
        }
        return view('dashbord',compact('data','data1'));
    }
}

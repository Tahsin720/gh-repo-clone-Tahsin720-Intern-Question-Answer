<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Curd_operation extends Controller
{
    public function registration(){
        return view("auth.Registration");
    }
    public function registerUser(Request $request){
        $user = new User();
        $user->user_name = $request->user;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->password = $request->password;
        $user->date_of_birth = $request->date_of_birth;
        $user->status = $request->status;
        $res = $user -> save();
        if($res){
            back()->with('success', 'You have registered successfully!');
            return redirect('/');
        }
        else{
            return back()->with('fail', 'Something Worng!');
        }
    }
    
    public function usertable(){
        $users = user::all();
        return view("auth.user_table", ['users' => $users]);
    }
    public function editpage(Request $request){
        $user = user::where('id', '=', $request->id)->first();
        // print($user->user_name);
        return view("auth.edit", ['user' => $user]);
    }
    
    public function edituser(Request $request){ 
        user::where('id', '=', $request->id)->update([
                                                        "user_name" => $request->user,
                                                        "email" => $request->email, 
                                                        "date_of_birth" => $request->date_of_birth,
                                                        "city" => $request->city, 
                                                        "country" => $request->country,
                                                        "status" => $request->status
                                                    ]);
        return redirect('/');
    }

    public function deletefunc(Request $request){
        $user = user::where('id', '=', $request->id)->first();
        $user->delete();
        return redirect('/');
    }
}

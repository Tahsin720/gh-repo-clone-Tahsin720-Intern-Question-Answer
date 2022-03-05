<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Curd_operation extends Controller
{
    public function registration(){
        return view("auth.Registration");
    }
    public function registerUser(Request $request){
        $user = new User();
        $user->User_Name = $request->user;
        $user->First_Name = $request->firstname;
        $user->Last_Name = $request->lastname;
        $user->Email = $request->email;
        $user->Password = Hash::make($request->password);
        $res = $user -> save();
        if($res){
            back()->with('success', 'You have registered successfully!');
            return redirect('login');
        }
        else{
            return back()->with('fail', 'Something Worng!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profileEdit (User $user){

        return view('users.redagavimas',['user'=>$user]);
    }

    public function profileUpdate (Request $request){

        $student=User::find(Auth::user()->id);
        $student->name=$request->name;
        $student->surname=$request->surname;

        $student->email = $request->email;

        if($request->file('img')!=null) {
            $foto = $request->file('img');

            $fotoname = rand() . '.' . $foto->extension();
            $foto->storeAs('images',$fotoname);
            $student->photo = $fotoname;
        }


        if($request->password == null) {

        } else if($request->password != null){

            $oldpass = $request->password;

            if(Hash::check($oldpass, $student->password)) {

                if($request->newpassword == $request->confirm_new_password) {
                    $student->password = Hash::make($request['newpassword']);
                } else {
                    return response()->json('Passwords do not match');
                }
            } else {
                return response()->json('Password is wrong');
            }
        }
        $student->save();

        return redirect()->back();
    }
}

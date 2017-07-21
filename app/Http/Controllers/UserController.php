<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    function adminPanel(){
    	$users = User::all();
    	return view('/pages/admin_panel', compact('users'));
    }

    function addUser(Request $request){
    	$new_user = new User;
    	$new_user->name = $request->name;
    	$new_user->employee_number = $request->emp;
    	$new_user->department = $request->dept;
    	$new_user->position = $request->post;
    	$new_user->date_started = $request->hired;
    	$new_user->address = $request->add;
    	$new_user->birthday = $request->bday;
    	$new_user->marital_status = $request->mar_stat;
    	$new_user->status = $request->stat;
    	$new_user->bank_info = $request->bank;
    	$new_user->email = $request->email;
    	$new_user->password = '123456';
    	$new_user->save();
    	return back();
    }

    function adminViewUser($id){
    	$user = User::find($id);
    	echo '
      	<div id="userInfo">
        	<p>Name: '.$user->name.'</p>
        	<p>Employee Number: '.$user->employee_number.'</p>
        	<p>Department: '.$user->department.'</p>
        	<p>Position: '.$user->position.'</p>
        	<p>Date Hired: '.$user->date_started.'</p>
        	<p>Address: '.$user->address.'</p>
        	<p>Birthday: '.$user->birthday.'</p>
        	<p>Marital Status: '.$user->marital_status.'</p>
        	<p>Status: '.$user->status.'</p>
        	<p>Bank Info: '.$user->bank_info.'</p>
        	<p>Email: '.$user->email.'</p>
      	</div>
      	<div id="userEdit" style="display: none">
      		<input type="text" name="name" value="'.$user->name.'">
      	</div>';
    }
}

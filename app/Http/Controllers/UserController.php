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
        	<p>Birthday: '.$user->birthday.'</p>';
            if($user->marital_status == 0){
            	echo '<p>Marital Status: Single</p>';
            }else{
                echo '<p>Marital Status: Married</p>';
            }
            if($user->status == 0){
            	echo'<p>Status: Active</p>';
            }elseif($user->status == 1){
                echo'<p>Status: On leave</p>';
            }elseif($user->status == 2){
                echo'<p>Status: Retired</p>';
            }else{
                echo'<p>Status: Terminated</p>';
            }
        	echo '<p>Bank Info: '.$user->bank_info.'</p>
        	<p>Email: '.$user->email.'</p>
      	</div>

      	<div id="userEdit" style="display: none">
            <form method="post" action="">
                <div class="form-group">
                    <label for="edit_usr">Name:</label>
          		    <input type="text" name="name" value="'.$user->name.'" id="edit_usr" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_emp">Employee Number:</label>
                    <input type="number" class="form-control" id="edit_emp" name="emp" value="'.$user->employee_number.'">
                </div>
                 <div class="form-group">
                    <label for="edit_dept">Department:</label>
                    <input type="text" class="form-control" id="edit_dept" name="dept" value="'.$user->department.'">
                </div>
                <div class="form-group">
                    <label for="edit_pos">Position:</label>
                    <input type="text" class="form-control" id="edit_pos" name="pos" value="'.$user->position.'">
                </div>
                <div class="form-group">
                    <label for="edit_hired">Position:</label>
                    <input type="date" class="form-control" id="edit_hired" name="hired" value="'.$user->date_started.'">
                </div>
                <div class="form-group">
                    <label for="edit_add">Address:</label>
                    <input type="text" class="form-control" id="edit_add" name="add" value="'.$user->address.'">
                </div>
                <div class="form-group">
                    <label for="edit_bday">Birthday:</label>
                    <input type="date" class="form-control" id="edit_bday" name="bday" value="'.$user->birthday.'">
                </div>
                <div class="form-group">
                    <label>Marital Status: &nbsp;</label>';
            if($user->marital_status == 0){
                    echo '<label class="radio-inline">
                    <input type="radio" name="mar_stat" value="0" checked>Single</label>
                    <label class="radio-inline">
                    <input type="radio" name="mar_stat" value="1">Married</label>';
            }else{
                    echo '<label class="radio-inline">
                    <input type="radio" name="mar_stat" value="0">Single</label>
                    <label class="radio-inline">
                    <input type="radio" name="mar_stat" value="1" checked>Married</label>';
            }
                echo '</div>
                <div class="form-group">
                    <label>Status: &nbsp;</label>';
            if($user->status == 0){
                    echo'<label class="radio-inline">
                    <input type="radio" name="stat" value="0" checked>Active</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="1">On Leave</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="2">Retired</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="3">Terminated</label>';
            }elseif($user->status == 1){
                    echo'<label class="radio-inline">
                    <input type="radio" name="stat" value="0">Active</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="1" checked>On Leave</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="2">Retired</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="3">Terminated</label>';
            }elseif($user->status == 2){
                    echo'<label class="radio-inline">
                    <input type="radio" name="stat" value="0">Active</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="1">On Leave</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="2" checked>Retired</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="3">Terminated</label>';
            }else{
                    echo'<label class="radio-inline">
                    <input type="radio" name="stat" value="0">Active</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="1">On Leave</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="2">Retired</label>
                    <label class="radio-inline">
                    <input type="radio" name="stat" value="3" checked>Terminated</label>';
            }
          	    echo'<div class="form-group">
                    <label for="edit_bank">Bank Account Number:</label>
                    <input type="number" class="form-control" id="edit_bank" name="bank_info" value="'.$user->bank_info.'">
                </div>
                <div class="form-group">
                    <label for="edit_email">Email:</label>
                    <input type="text" class="form-control" id="edit_email" name="email" value="'.$user->email.'">
                </div>
        </div>';
    }
}

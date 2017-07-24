<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\sss_contribs;
use App\philhealth_contribs;

class UserController extends Controller
{   
    //view the admin panel
    function adminPanel(){
    	$users = User::all();
    	return view('/pages/admin_panel', compact('users'));
    }

    //add new user function
    function addUser(Request $request){
    	$new_user = new User;
    	$new_user->name = $request->name;
    	$new_user->employee_number = $request->emp;
    	$new_user->department = $request->dept;
    	$new_user->position = $request->post;
        $new_user->salary = $request->sal;
    	$new_user->date_started = $request->hired;
    	$new_user->address = $request->add;
    	$new_user->birthday = $request->bday;
    	$new_user->marital_status = $request->mar_stat;
    	$new_user->status = $request->stat;
    	$new_user->bank_info = $request->bank;
    	$new_user->email = $request->email;
    	$new_user->password = bcrypt('123456');
    	$new_user->save();
    	return back();
    }

    //view user info and edit info via modal
    function adminViewUser($id){
    	$user = User::find($id);
    	echo '
      	<div id="tabUserInfo" class="tab-pane fade in active">
        	<p>Name: '.$user->name.'</p>
        	<p>Employee Number: '.$user->employee_number.'</p>
        	<p>Department: '.$user->department.'</p>
        	<p>Position: '.$user->position.'</p>
            <p>Salary: '.$user->salary.'</p>
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

      	<div id="tabUserUpdate" class="tab-pane fade">
            <form id="userUpdate">
                <input type="hidden" value="'.$user->id.'" id="userEditId">
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
                    <label for="edit_sal">Salary:</label>
                    <input type="text" class="form-control" id="edit_sal" name="sal" value="'.$user->salary.'">
                </div>
                <div class="form-group">
                    <label for="edit_hired">Date Hired:</label>
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
          	echo'</div>
                <div class="form-group">
                    <label for="edit_bank">Bank Account Number:</label>
                    <input type="number" class="form-control" id="edit_bank" name="bank_info" value="'.$user->bank_info.'">
                </div>
            </form>
            <button id="saveUserEdit" data-dismiss="modal">Save Changes</button>
        </div>

        <div id="tabUserUpdatePw" class="tab-pane fade">
            <form id="acctUpdate">
                <div class="form-group">
                    <label for="edit_email">Email:</label>
                    <input type="text" class="form-control" id="edit_email" name="email" value="'.$user->email.'">
                </div>
                <div class="form-group">
                    <label for="edit_pw">New Password:</label>
                    <input type="password" class="form-control" id="edit_pw" name="pw">
                </div>
            </form>
            <button id="saveUserAcctEdit" data-dismiss="modal">Save Changes</button>
        </div>';
    }

    //update user info via modal
    function adminUpdateUser($id, Request $request){
        $upd_user = User::find($id);
        $upd_user->name = $request->name;
        $upd_user->employee_number = $request->emp_num;
        $upd_user->department = $request->dept;
        $upd_user->position = $request->pos;
        $upd_user->salary = $request->sal;
        $upd_user->date_started = $request->hired;
        $upd_user->address = $request->add;
        $upd_user->birthday = $request->bday;
        $upd_user->marital_status = $request->mar_stat;
        $upd_user->status = $request->stat;
        $upd_user->bank_info = $request->bank;
        $upd_user->save();

        $users = User::all();
        foreach($users as $user){
            echo '
            <tr>
                <td><a data-uid="'.$user->id.'" class="openUserPanel" href="#tabUserInfo">'.$user->name.'</a></td>
                <td>'.$user->department.'</td>
                <td>'.$user->position.'</td>';
                if($user->status == 0){
                    echo '<td>Active</td>';
                }
                elseif($user->status == 1){
                    echo '<td>On leave</td>';
                }
                elseif($user->status == 2){
                    echo '<td>Retired</td>';
                }
                else{
                    echo '<td>Terminated</td>';
                }
                echo '<td><button class="btn btn-xs btn-default payrollModalTrigger" data-uid="'.$user->id.'">Update Payroll</button></td>
            </tr>';
        }
    }

    //Update user account info via modal
    function adminUpdateUserAcct($id, Request $request){
        $upd_user = User::find($id);
        $upd_user->email = $request->email;
        if(isset($request->pw)){
            $upd_user->password = bcrypt($request->pw);
        }
        $upd_user->save();
    }

    function getPayrollForm($id){
        $pay_user = User::find($id);
        echo '
        <input type="hidden" id="userSal" value="'.$pay_user->salary.'"
        <div class="form-group">
            <label for="hrs_absent">Absences</label>
            <input type="number" id="hrs_absent" name="hrs_absent" class="form-control" value="0" min="0">
        </div>
        <div class="form-group">
            <label for="hrs_reg_ot">Regular Overtime</label>
            <input type="number" id="hrs_reg_ot" name="hrs_reg_ot" class="form-control" value="0" min="0">
        </div>
        <div class="form-group">
            <label for="hrs_rd_ot">Rest Day Overtime</label>
            <input type="number" id="hrs_rd_ot" name="hrs_rd_ot" class="form-control" value="0" min="0">
        </div>
        <div class="form-group">
            <label for="hrs_rd_hot">Rest Day Holiday Overtime</label>
            <input type="number" id="hrs_rd_hot" name="hrs_rd_hot" class="form-control" value="0" min="0">
        </div>
        <div class="form-group">
            <label for="hrs_reg_hot">Regular Holiday Overtime</label>
            <input type="number" id="hrs_reg_hot" name="hrs_reg_hot" class="form-control" value="0" min="0">
        </div>
        <button>Submit</button>';
    }

    function contribCheck(Request $request){
        $philhealth = $sss = $request->sss;
        $new_philhealth = new philhealth_contribs;
        $new_sss = new sss_contribs();
        $dataSss = $new_sss->sss($sss);
        $dataPhilhealth = $new_philhealth->philHealth($philhealth);
        echo '<p>SSS Contrib: '.$dataSss->monthly_contribution.'</p>';
        echo '<p>Phil Health Contrib: '.$dataPhilhealth->monthly_contribution.'</p>';
    }
}
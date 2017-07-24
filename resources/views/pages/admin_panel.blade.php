@extends('../layouts/master')

@section('title')
	Admin Panel
@endsection

@section('main_section')
<!-- add users -->
	<div class="well">
		<div class="panel-group">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" href="#collapse1">Add New User</a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse">
		      <div class="panel-body">
		      	<form method="post" action="admin_panel/add_user">
			      	{{csrf_field()}}	
			      	<div class="form-group">
						<label for="usr">Name:</label>
					  	<input type="text" class="form-control" id="usr" name="name">
					</div>
					<div class="form-group">
					  	<label for="email">Email:</label>
					  	<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
					  	<label for="emp">Employee Number:</label>
					  	<input type="number" class="form-control" id="emp" name="emp">
					</div>
					<div class="form-group">
					  	<label for="add">Date Hired:</label>
					  	<input type="date" class="form-control date-picker" id="add" name="hired">
					</div>
					<div class="form-group">
					  	<label for="dept">Department:</label>
					  	<input type="text" class="form-control" id="dept" name="dept">
					</div>
					<div class="form-group">
					  	<label for="pos">Position:</label>
					  	<input type="text" class="form-control" id="pos" name="post">
					</div>
					<div class="form-group">
					  	<label for="sal">Salary:</label>
					  	<input type="number" class="form-control" id="sal" name="sal">
					</div>
					<div class="form-group">
						<label>Status: &nbsp;</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="0">Active</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="1">On Leave</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="2">Retired</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="stat" value="3">Terminated</label>
					</div>
					<div class="form-group">
					  	<label for="add">Address:</label>
					  	<input type="text" class="form-control" id="add" name="add">
					</div>
					<div class="form-group">
					  	<label for="bday">Birthday:</label>
					  	<input type="date" class="form-control date-picker" id="bday" name="bday">
					</div>
					<div class="form-group">
						<label>Marital Status: &nbsp;</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="mar_stat" value="0">Single</label>
					  	<label class="radio-inline">
					  	<input type="radio" name="mar_stat" value="1">Married</label>
					</div>
					<div class="form-group">
					  	<label for="bank">Bank Account Number:</label>
					  	<input type="text" class="form-control" id="bank" name="bank">
					</div>
		      </div>
		      <div class="panel-footer">
		      	<button type="submit">Submit</button>
		      	</form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

<!-- users list -->
<div class="well">
Users
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Department</th>
				<th>Position</th>
				<th>Status</th>
				<th>Actions</th>
				<th><input type="hidden" value="{{csrf_token()}}" id="token"></th>
			</tr>
		</thead>
		<tbody id="usersViewBody">
		@foreach($users as $user)
			<tr>
				<td><a data-uid="{{$user->id}}" class="openUserPanel" href="#tabUserInfo"> {{$user->name}}</a></td>
				<td>{{$user->department}}</td>
				<td>{{$user->position}}</td>
				@if($user->status == 0)
					<td>Active</td>
				@elseif($user->status == 1)
					<td>On leave</td>
				@elseif($user->status == 2)
					<td>Retired</td>
				@else
					<td>Terminated</td>
				@endif
				<td><button class="btn btn-xs btn-default payrollModalTrigger" data-uid="{{$user->id}}"">Update Payroll</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>

<!-- modal displaying individual user info and edit option -->
<div id="userPanel">
	  	<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#tabUserInfo">User Info</a></li>
		  <li><a data-toggle="tab" href="#tabUserUpdate">Update Info</a></li>
		  <li><a data-toggle="tab" href="#tabUserUpdatePw">Update Password</a></li>
		</ul>
		<div class="tab-content">	  
		</div>
</div>

<!-- modal displaying the payroll form -->
<div id="payrollModal">
	<form id="payrollForm">
	</form>
		<!-- test field -->
		<form method="POST" action="/admin/contribCheck">
		{{csrf_field()}}
		<input type="number" name="sss">
		<button id="valTest">Contrib Check</button>
		</form>
</div>
@endsection
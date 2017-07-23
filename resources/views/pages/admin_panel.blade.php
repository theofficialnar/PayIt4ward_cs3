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
				<td><a data-toggle="modal" data-target="#userPanel" data-uid="{{$user->id}}" class="openUserPanel"> {{$user->name}}</a></td>
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
				<td><button class="btn btn-xs btn-default payrollModalTrigger">Update Payroll</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>

<!-- modal displaying individual user info and edit option -->
<div id="userPanel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
	    <div class="modal-header">
	    	<button type="button" class="close" data-dismiss="modal" id="closeUserEdit">&times;</button>
	   		<h4 class="modal-title" id="userModalHead">User Info</h4>
	  	</div>
	  	<div class="modal-body">
	  	</div>
	  	<div class="modal-footer">
	  		<button id="triggerUserEdit">Edit</button>
	  		<button id="saveUserEdit" data-dismiss="modal">Save</button>
	  	</div>
    </div>
  </div>
</div>

<!-- modal displaying the payroll form -->
<div id="payrollModal">
	<form>
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
		<button>Submit</button>
	</form>
</div>
@endsection
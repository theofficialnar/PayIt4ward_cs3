@extends('../layouts/master')

@section('title')
    View Payroll
@endsection

@section('main_section')
  <div class="well">
    <div class="form-group row">
		<div class="col-lg-4">
			<label for="sel1">Select Payroll to View:</label>
			<select id="payrollSelect" class="form-control">
				@if(is_object($payrolls))
					@foreach($payrolls as $payroll)
					<option>{{ $payroll->date_paid }}</option>
					@endforeach
				@else
					<option>{{ $payrolls->date_paid }}</option>
				@endif
			</select>
			
		</div>
    </div>
	<div id="showPayroll"><h1>asdasdasdas</h1></div>
  </div>
  <button id="testsubmit">Submit</button>
@endsection
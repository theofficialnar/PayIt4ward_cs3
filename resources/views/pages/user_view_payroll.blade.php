@extends('../layouts/master')

@section('title')
    View Payroll
@endsection

@section('main_section')
  <div class="well">
		<input type="hidden" id="token" value="{{csrf_token()}}">
    <div class="form-group row">
		<div class="col-lg-4">
			<label for="sel1">Select Payroll to View:</label>
			<select id="payrollSelect" class="form-control">
				@if(is_object($payrolls))
					@foreach($payrolls as $payroll)
					<option value="{{ $payroll->date_paid }}">{{ date('F Y', strtotime($payroll->date_paid)) }}</option>
					@endforeach
				@else
					<option value="{{ $payroll->date_paid }}">{{ date('F Y', strtotime($payrolls->date_paid)) }}</option>
				@endif
			</select>
			<button id="testsubmit">Submit</button>
		</div>
    </div>
	<div id="showPayroll" class="row"></div>
  </div>
  
@endsection
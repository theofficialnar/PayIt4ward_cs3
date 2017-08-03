@extends('../layouts/master')

@section('title')
    View Payroll
@endsection

@section('main_section')
<div class="topPadding">
 	<div class="well">
		<input type="hidden" id="token" value="{{csrf_token()}}">
	    <div class="form-group row">
			<div class="col-lg-4 col-lg-offset-4">
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
				<div class="text-center">
					<button id="testsubmit" class="btn btn-primary" style="margin-top: 5px; width: 45%"><span class="glyphicon glyphicon-search"></span><b> Submit</b></button>
				</div>
			</div>
	    </div>
		<div id="showPayroll" class="row">
			<div class="text-center">
				<img src="{{ url('assets/images/placeholder.png') }}" alt="div_tmp_photo" class="img-responsive" style="display: inline-block; max-width: 60%">
			</div>
		</div>
  	</div>
</div>

{{-- payroll error modal --}}
<div id="errPayroll"></div>
  
@endsection
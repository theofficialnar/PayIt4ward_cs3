<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sss_contribs;
use App\philhealth_contribs;
use App\bonusesandots;
use App\User;
use App\taxes;
use DB;
use App\payrolls;
use Carbon\Carbon;
use Auth;

class PayrollsController extends Controller
{
	//function defining the employee's pag-ibig contrib
	function pagibigContrib($val){
		if($val <= 1500){
			$pagibig = $val * 0.01;
		}else{
			$pagibig = 100;
		};
		return $pagibig;
	}

	//function to calculate the employee's hourly rate
	function hourlyRate($days, $hours, $salary){
		if($days == 5){
    		$hourly_rate = round((($salary*12)/261)/$hours, 2);
    	}else{
    		$hourly_rate = round((($salary*12)/312)/$hours, 2);
    	};
    	return $hourly_rate;
	}

	//contrib tester
    function contribCheck(Request $request){
        $pagibig = $philhealth = $sss = $request->sal;
        $dataPagibig = $this->pagibigContrib($pagibig);
        $new_philhealth = new philhealth_contribs();
        $new_sss = new sss_contribs();
        $dataSss = $new_sss->sss($sss);
        $dataPhilhealth = $new_philhealth->philHealth($philhealth);
        echo '<p>SSS Contrib: '.$dataSss->monthly_contribution.'</p>';
        echo '<p>Phil Health Contrib: '.$dataPhilhealth->monthly_contribution.'</p>';
        echo '<p>Pagibig Contrib: '.$dataPagibig.'</p>';
    }

    //computes the employee's salary
    function calcTaxableSalary($salary, $overtime, $holiday, $night_diff, $lates, $absences, $deductions){
        $taxable_salary = ((($salary + $overtime + $holiday + $night_diff) - $lates) - $absences) - $deductions;
        return $taxable_salary;
    }

    //handles and displays all related info regarding the employee's payroll
    function payrollUpdate(Request $request){
    	$uid = $request->uid;
    	$employee = User::find($uid);
    	$salary = $employee->salary;
        $dependents = $employee->dependents;
    	$days = $employee->days_per_week;
    	$hours = $employee->hrs_per_day;
    	$data_hourly = $this->hourlyRate($days, $hours, $salary);

        //finds the corresponding deduction brackets for sss, pagibig and philhealth
        $init_philhealth = new philhealth_contribs();
        $init_sss = new sss_contribs();
        $ded_philhealth = $init_philhealth->philHealth($salary)->monthly_contribution;
        $ded_sss = $init_sss->sss($salary)->monthly_contribution;
        $ded_pagibig = $this->pagibigContrib($salary);

        //gets all the number of hours indicated on the form
        $hrs_absences = $request->hrs_absent;
        $hrs_lates = $request->hrs_late;
        $hrs_rd = $request->hrs_rd;
        $hrs_shol = $request->hrs_shol;
        $hrs_shol_rd = $request->hrs_shol_rd;
        $hrs_hol = $request->hrs_hol;
        $hrs_hol_rd = $request->hrs_hol_rd;
        $hrs_ot_ord = $request->hrs_ot_ord;
        $hrs_ot_rd = $request->hrs_ot_rd;
        $hrs_ot_shol = $request->hrs_ot_shol;
        $hrs_ot_shol_rd = $request->hrs_ot_shol_rd;
        $hrs_ot_rhol = $request->hrs_ot_rhol;
        $hrs_ot_rhol_rd = $request->hrs_ot_rhol_rd;
        $hrs_nd_ord = $request->hrs_nd_ord;
        $hrs_nd_rd = $request->hrs_nd_rd;
        $hrs_nd_shol = $request->hrs_nd_shol;
        $hrs_nd_shol_rd = $request->hrs_nd_shol_rd;
        $hrs_nd_rhol = $request->hrs_nd_rhol;
        $hrs_nd_rhol_rd = $request->hrs_nd_rhol_rd;

        //computes the total amount of deductions, holiday pay, ot and night diff based off the hours submitted
        $tot_absences = $hrs_absences * $data_hourly;
        $tot_lates = $hrs_lates * $data_hourly;
    	$bonus = new bonusesandots();
        $tot_rd = $bonus->calc_rd($data_hourly, $hrs_rd);
        $tot_shol = $bonus->calc_s_holiday($data_hourly, $hrs_shol);
        $tot_shol_rd = $bonus->calc_rd_s_holiday($data_hourly, $hrs_shol_rd);
        $tot_rhol = $bonus->calc_reg_holiday($data_hourly, $hrs_hol);
        $tot_rhol_rd = $bonus->calc_rd_reg_holiday($data_hourly, $hrs_hol_rd);
        $tot_ot_ord = $bonus->calc_ot_ord($data_hourly, $hrs_ot_ord);
        $tot_ot_rd = $bonus->calc_ot_rd($data_hourly, $hrs_ot_rd);
        $tot_ot_shol = $bonus->calc_ot_s_holiday($data_hourly, $hrs_ot_shol);
        $tot_ot_shol_rd = $bonus->calc_ot_rd_s_holiday($data_hourly, $hrs_ot_shol_rd);
        $tot_ot_rhol = $bonus->calc_ot_reg_holiday($data_hourly, $hrs_ot_rhol);
        $tot_ot_rhol_rd = $bonus->calc_ot_rd_reg_holiday($data_hourly, $hrs_ot_rhol_rd);
        $tot_nd_ord = $bonus->calc_nd_ord($data_hourly, $hrs_nd_ord);
        $tot_nd_rd = $bonus->calc_nd_rd($data_hourly, $hrs_nd_rd);
        $tot_nd_shol = $bonus->calc_nd_s_holiday($data_hourly, $hrs_nd_shol);
        $tot_nd_shol_rd = $bonus->calc_nd_rd_s_holiday($data_hourly, $hrs_nd_shol_rd);
        $tot_nd_rhol = $bonus->calc_nd_reg_holiday($data_hourly, $hrs_nd_rhol);
    	$tot_nd_rhol_rd = $bonus->calc_nd_rd_reg_holiday($data_hourly, $hrs_nd_rhol_rd);

        //computes the overall salary
        $data_deduction = $ded_philhealth + $ded_sss + $ded_pagibig;
        $data_overtime = $tot_ot_ord + $tot_ot_rd + $tot_ot_shol + $tot_ot_shol_rd + $tot_ot_rhol + $tot_ot_rhol_rd;
        $data_holiday = $tot_rd + $tot_shol + $tot_shol_rd + $tot_rhol + $tot_rhol_rd;
        $data_night_diff = $tot_nd_ord + $tot_nd_rd + $tot_nd_shol + $tot_nd_shol_rd + $tot_nd_rhol + $tot_nd_rhol_rd;
        $taxable_salary = $this->calcTaxableSalary($salary, $data_overtime, $data_holiday, $data_night_diff, $tot_lates, $tot_absences, $data_deduction);

        //calculates tax and monthly salary after deductions and tax
        $init_tax = new taxes();
        $tax = $init_tax->calcTax($taxable_salary, $dependents);
        $monthly_salary = $taxable_salary - $tax;
        

    	echo '
        <div class="vcenter" style="height: 100vh">
            <div class="well col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <input type="hidden" id="payID" value="'.$uid.'">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th class="payrollWidth">Deduction</th>
                            <th>Amount (Php)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Absences</td>
                            <td id="ded_absences">'.number_format($tot_absences, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>Lates</td>
                            <td id="ded_lates">'.number_format($tot_lates, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>Philhealth</td>
                            <td id="ded_philhealth">'.number_format($ded_philhealth, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>SSS</td>
                            <td id="ded_sss">'.number_format($ded_sss, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>Pagibig</td>
                            <td id="ded_pagibig">'.number_format($ded_pagibig, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td id="ded_tax">'.number_format($tax, 2, '.', ',').'</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th class="payrollWidth">Bonus</th>
                            <th>Amount (Php)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Overtime</td>
                            <td id="bon_overtime">'.number_format($data_overtime, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>Holiday</td>
                            <td id="bon_holiday">'.number_format($data_holiday, 2, '.', ',').'</td>
                        </tr>
                        <tr>
                            <td>Night Differential</td>
                            <td id="bon_night_diff">'.number_format($data_night_diff, 2, '.', ',').'</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="text-center"><span class="payrollLabel">Total Salary:</span> Php <span id="month_salary">'.number_format($monthly_salary, 2, '.', ',').'</span></h1>
                        <button id="savePayroll" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Save & Update Payroll</button>
                    </div>
                </div>
            </div>
        </div>';
    }

    function testTax(Request $request){
        $dependents = 0;
        $input = 13286.20;
        $init_tax = new taxes();
        $tax = $init_tax->calcTax($input, $dependents);
        dd($tax);
    }

    //saves the data to the payroll database
    function payrollSave(Request $request, $id){
        $date = Carbon::now();
        $new_payroll = new payrolls;
        $new_payroll->user_id = $id;
        $new_payroll->salary = str_replace(",", "", $request->salary);
        $new_payroll->bon_overtime = str_replace(",", "", $request->overtime);
        $new_payroll->bon_holiday = str_replace(",", "", $request->holiday);
        $new_payroll->bon_night_diff = str_replace(",", "", $request->night_diff);
        $new_payroll->ded_sss = str_replace(",", "", $request->sss);
        $new_payroll->ded_pagibig = str_replace(",", "", $request->pagibig);
        $new_payroll->ded_philhealth = str_replace(",", "", $request->philhealth);
        $new_payroll->ded_absences = str_replace(",", "", $request->absences);
        $new_payroll->ded_lates = str_replace(",", "", $request->lates);
        $new_payroll->ded_tax = str_replace(",", "", $request->tax);
        $new_payroll->date_paid = $date;
        $new_payroll->save();
    }

    //retrieves all available payroll dates to be used for the dropdown
    function payroll(){
        $uid = Auth::id();
        $payrolls = DB::table('payrolls')
                ->where('user_id', $uid)
                ->get();
        // dd($payrolls);
        // echo $dates;
        return view('/pages/user_view_payroll', compact('payrolls'));
    }

    //view a payroll according to selected date
    function viewPayroll(Request $request){
        $uid = Auth::id();
        $view_payroll = $request->payroll;
        $payroll = DB::table('payrolls')
                ->where('user_id', $uid)
                ->where('date_paid', $view_payroll)
                ->first();
        // dd($payroll);
        echo '
        <div class="col-lg-6 col-lg-offset-3">
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="payrollWidth">Deduction</th>
                        <th>Amount (Php)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Absences</td>
                        <td>'.number_format($payroll->ded_absences, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>Lates</td>
                        <td>'.number_format($payroll->ded_lates, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>Philhealth</td>
                        <td>'.number_format($payroll->ded_philhealth, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>SSS</td>
                        <td>'.number_format($payroll->ded_sss, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>Pagibig</td>
                        <td>'.number_format($payroll->ded_pagibig, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>'.number_format($payroll->ded_tax, 2, '.', ',').'</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="payrollWidth">Bonus</th>
                        <th>Amount (Php)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Overtime</td>
                        <td>'.number_format($payroll->bon_overtime, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>Holiday</td>
                        <td>'.number_format($payroll->bon_holiday, 2, '.', ',').'</td>
                    </tr>
                    <tr>
                        <td>Night Differential</td>
                        <td>'.number_format($payroll->bon_night_diff, 2, '.', ',').'</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="text-center"><span class="payrollLabel">Total Salary:</span> Php <span id="month_salary">'.number_format($payroll->salary, 2, '.', ',').'</span></h1>
                </div>
            </div>
        </div>';
    }

}
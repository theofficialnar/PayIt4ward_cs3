<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sss_contribs;
use App\philhealth_contribs;
use App\bonusesandots;
use App\User;
use App\taxes;
use DB;

class PaymentsController extends Controller
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
        <p>Regular Hourly Rate: '.$data_hourly.'</p>
        <h4> Deductions </h4>
        <p> Absences: '.$tot_absences.'</p>
        <p> Lates: '.$tot_lates.'</p>
        <h4> Added on top of Overall Salary</h4>
        <p>Rest Day: '.$tot_rd.'</p>
        <p>Special Holiday: '.$tot_shol.'</p>
        <p>Rest Day + Special Holiday: '.$tot_shol_rd.'</p>
        <p>Regular Holiday: '.$tot_rhol.'</p>
        <p>Rest Day + Regular Holiday: '.$tot_rhol_rd.'</p>
        <p>Overtime Ordinary: '.$tot_ot_ord.'</p>
        <p>Overtime + Rest Day: '.$tot_ot_rd.'</p>
        <p>Overtime + Special Holiday: '.$tot_ot_shol.'</p>
        <p>Overtime + Special Holiday + Rest Day: '.$tot_ot_shol_rd.'</p>
        <p>Overtime + Regular Holiday: '.$tot_ot_rhol.'</p>
        <p>Overtime + Regular Holiday + Rest Day: '.$tot_ot_rhol_rd.'</p>
        <p>Night Diff Ordinary: '.$tot_nd_ord.'</p>
        <p>Night Diff + Rest Day: '.$tot_nd_rd.'</p>
        <p>Night Diff + Special Holiday: '.$tot_nd_shol.'</p>
        <p>Night Diff + Special Holiday + Rest Day: '.$tot_nd_shol_rd.'</p>
        <p>Night Diff + Regular Holiday: '.$tot_nd_rhol.'</p>
    	<p>Night Diff + Regular Holiday + Rest Day: '.$tot_nd_rhol_rd.'</p>';

        echo '<h4> Hours </h4>';
        echo 'Absences: '.$hrs_absences.'<br>';
        echo 'Lates: '.$hrs_lates.'<br>';
        echo 'Rest Day: '.$hrs_rd.'<br>';
        echo 'Special Holiday: '.$hrs_shol.'<br>';
        echo 'Special Holiday + Rest Day: '.$hrs_shol_rd.'<br>';
        echo 'Regular Holiday: '.$hrs_hol.'<br>';
        echo 'Regular Holiday + Rest Day: '.$hrs_hol_rd.'<br>';
        echo 'Overtime Ordinary: '.$hrs_ot_ord.'<br>';
        echo 'Overtime Rest Day: '.$hrs_ot_rd.'<br>';
        echo 'Overtime Special Holiday: '.$hrs_ot_shol.'<br>';
        echo 'Overtime Special Holiday + Rest Day: '.$hrs_ot_shol_rd.'<br>';
        echo 'Overtime Regular Holiday: '.$hrs_ot_rhol.'<br>';
        echo 'Overtime Regular Holiday + Rest Day: '.$hrs_ot_rhol_rd.'<br>';
        echo 'Night Diff Ordinary: '.$hrs_nd_ord.'<br>';
        echo 'Night Diff Rest Day: '.$hrs_nd_rd.'<br>';
        echo 'Night Diff Special Holiday: '.$hrs_nd_shol.'<br>';
        echo 'Night Diff Special Holiday + Rest Day: '.$hrs_nd_shol_rd.'<br>';
        echo 'Night Diff Regular Holiday: '.$hrs_nd_rhol.'<br>';
        echo 'Night Diff Regular Holiday + Rest Day: '.$hrs_nd_rhol_rd.'<br>';

        echo '
        <h4>Government Deductions </h4>
        <p>Philhealth: '.$ded_philhealth.'</p>
        <p>SSS: '.$ded_sss.'</p>
        <p>Pagibig: '.$ded_pagibig.'</p>';

        echo '<p> Taxable Salary: '.$taxable_salary.'</p>';
        echo '<p> Tax: '.$tax.'</p>';
        echo '<p> Total Salary: '.$monthly_salary.'</p>';

    }

    function testTax(Request $request){
        $dependents = 0;
        $input = 13286.20;
        $init_tax = new taxes();
        $tax = $init_tax->calcTax($input, $dependents);
        // $result = DB::table('taxes')
        //     ->select('*', DB::raw("ABS(sme - $input) AS difference"))
        //     ->orderBy('difference')
        //     ->where('sme', '<=', $input)
        //     ->first();
        // dd($result);
        // $bracket = $result->sme;
        // $exemption = $result->exemption;
        // $overhead = $result->status / 100;

        // $excess = ($input - $bracket) * $overhead;
        // $tax = $exemption + $excess;

        
        // echo 'Exemption: '.$exemption.'<br>';
        // echo 'Bracket: '.$bracket.'<br>';
        // echo 'Overhead: '.$overhead.'<br>';
        // echo 'Tax: '.$tax.'<br>';
        dd($tax);
    }

}
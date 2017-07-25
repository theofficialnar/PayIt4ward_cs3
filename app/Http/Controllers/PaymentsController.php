<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sss_contribs;
use App\philhealth_contribs;
use App\bonusesandots;
use App\User;

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

    function payrollUpdate(Request $request){
    	$uid = $request->uid;
    	$employee = User::find($uid);
    	$salary = $employee->salary;
    	$days = $employee->days_per_week;
    	$hours = $employee->hrs_per_day;
    	$data_hourly = $this->hourlyRate($days, $hours, $salary);

    	$bonus = new bonusesandots();
        $rd = $bonus->calc_rd($data_hourly,1);
        $s_holiday = $bonus->calc_s_holiday($data_hourly,1);
        $rd_s_holiday = $bonus->calc_rd_s_holiday($data_hourly,1);
        $reg_holiday = $bonus->calc_reg_holiday($data_hourly,1);
        $rd_reg_holiday = $bonus->calc_rd_reg_holiday($data_hourly,1);
        $ot_ord = $bonus->calc_ot_ord($data_hourly,1);
        $ot_rd = $bonus->calc_ot_rd($data_hourly,1);
        $ot_s_holiday = $bonus->calc_ot_s_holiday($data_hourly,1);
        $ot_rd_s_holiday = $bonus->calc_ot_rd_s_holiday($data_hourly,1);
        $ot_reg_holiday = $bonus->calc_ot_reg_holiday($data_hourly,1);
        $ot_rd_reg_holiday = $bonus->calc_ot_rd_reg_holiday($data_hourly,1);
        $nd_ord = $bonus->calc_nd_ord($data_hourly,1);
        $nd_rd = $bonus->calc_nd_rd($data_hourly,1);
        $nd_s_holiday = $bonus->calc_nd_s_holiday($data_hourly,1);
        $nd_rd_s_holiday = $bonus->calc_nd_rd_s_holiday($data_hourly,1);
        $nd_reg_holiday = $bonus->calc_nd_reg_holiday($data_hourly,1);
    	$nd_rd_reg_holiday = $bonus->calc_nd_rd_reg_holiday($data_hourly,1);

    	echo '
        <p>Regular Hourly Rate: '.$data_hourly.'</p>
        <h4> Added on top of Overall Salary</h4>
        <p>Rest Day: '.$rd.'</p>
        <p>Special Holiday: '.$s_holiday.'</p>
        <p>Rest Day + Special Holiday: '.$rd_s_holiday.'</p>
        <p>Regular Holiday: '.$reg_holiday.'</p>
        <p>Rest Day + Regular Holiday: '.$rd_reg_holiday.'</p>
        <p>Overtime Ordinary: '.$ot_ord.'</p>
        <p>Overtime + Rest Day: '.$ot_rd.'</p>
        <p>Overtime + Special Holiday: '.$ot_s_holiday.'</p>
        <p>Overtime + Special Holiday + Rest Day: '.$ot_rd_s_holiday.'</p>
        <p>Overtime + Regular Holiday: '.$ot_reg_holiday.'</p>
        <p>Overtime + Regular Holiday + Rest Day: '.$ot_rd_reg_holiday.'</p>
        <p>Night Diff Ordinary: '.$nd_ord.'</p>
        <p>Night Diff + Rest Day: '.$nd_rd.'</p>
        <p>Night Diff + Special Holiday: '.$nd_s_holiday.'</p>
        <p>Night Diff + Special Holiday + Rest Day: '.$nd_rd_s_holiday.'</p>
        <p>Night Diff + Regular Holiday: '.$nd_reg_holiday.'</p>
    	<p>Night Diff + Regular Holiday + Rest Day: '.$nd_rd_reg_holiday.'</p>';

    }

}

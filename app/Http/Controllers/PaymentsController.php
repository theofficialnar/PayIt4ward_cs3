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
    		$hourly_rate = round(($salary*12)/261/$hours, 2);
    	}else{
    		$hourly_rate = round(($salary*12)/312/$hours, 2);
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

    	$rd = new bonusesandots();
    	$rd_ot = $rd->calc_nd_rd($data_hourly,8);
    	$s_holiday = $rd->s_holiday();
    	$rd_s_holiday = $rd->rd_s_holiday();

    	echo '<p>Hourly Rate: '.$data_hourly.'</p>
    	<p>Rest Day: '.$rd_ot.'</p>';

    }

}

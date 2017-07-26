<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class taxes extends Model
{
    protected $table = 'taxes';

    function calcTax($taxable_salary, $dependents){
    	if($dependents == 0){
    		$findBracket = DB::table('taxes')
            			->select('*', DB::raw("ABS(sme - $taxable_salary) AS difference"))
            			->orderBy('difference')
            			->where('sme', '<=', $taxable_salary)
            			->first();
			$bracket = $findBracket->sme;
			$exemption = $findBracket->exemption;
			$overhead = $findBracket->status / 100;
			$excess = ($taxable_salary - $bracket) * $overhead;
			$tax = $exemption + $excess;
			
    	}
    	if($dependents == 1){
    		$findBracket = DB::table('taxes')
            			->select('*', DB::raw("ABS(me1se1 - $taxable_salary) AS difference"))
            			->orderBy('difference')
            			->where('me1se1', '<=', $taxable_salary)
            			->first();
			$bracket = $findBracket->me1se1;
			$exemption = $findBracket->exemption;
			$overhead = $findBracket->status / 100;
			$excess = ($taxable_salary - $bracket) * $overhead;
			$tax = $exemption + $excess;
			
    	}
    	if($dependents == 2){
    		$findBracket = DB::table('taxes')
            			->select('*', DB::raw("ABS(me2se2 - $taxable_salary) AS difference"))
            			->orderBy('difference')
            			->where('me2se2', '<=', $taxable_salary)
            			->first();
			$bracket = $findBracket->me2se2;
			$exemption = $findBracket->exemption;
			$overhead = $findBracket->status / 100;
			$excess = ($taxable_salary - $bracket) * $overhead;
			$tax = $exemption + $excess;
			
    	}
    	if($dependents == 3){
    		$findBracket = DB::table('taxes')
            			->select('*', DB::raw("ABS(me3se3 - $taxable_salary) AS difference"))
            			->orderBy('difference')
            			->where('me3se3', '<=', $taxable_salary)
            			->first();
			$bracket = $findBracket->me3se3;
			$exemption = $findBracket->exemption;
			$overhead = $findBracket->status / 100;
			$excess = ($taxable_salary - $bracket) * $overhead;
			$tax = $exemption + $excess;
			
    	}
    	if($dependents >= 4){
    		$findBracket = DB::table('taxes')
            			->select('*', DB::raw("ABS(me4se4 - $taxable_salary) AS difference"))
            			->orderBy('difference')
            			->where('me4se4', '<=', $taxable_salary)
            			->first();
			$bracket = $findBracket->me4se4;
			$exemption = $findBracket->exemption;
			$overhead = $findBracket->status / 100;
			$excess = ($taxable_salary - $bracket) * $overhead;
			$tax = $exemption + $excess;
			
    	}
    	return $tax;
    }
}

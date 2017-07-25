<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bonusesandots extends Model
{
    protected $table = 'bonusesandots';

    //premium value functions
    function rd(){
    	return $this->where('type', 'rd')->value('premium');
    }

    function s_holiday(){
    	return $this->where('type', 'spec_holiday')->value('premium');
    }

    function rd_s_holiday(){
    	return $this->where('type', 'spec_holiday+rd')->value('premium');
    }

    function reg_holiday(){
    	return $this->where('type', 'reg_holiday')->value('premium');
    }

    function rd_reg_holiday(){
    	return $this->where('type', 'reg_holiday+rd')->value('premium');
    }

    function ot_ord(){
    	return $this->where('type', 'ot_ord')->value('premium');
    }

    function ot_rd(){
    	return $this->where('type', 'ot_rd')->value('premium');
    }

    function ot_s_holiday(){
    	return $this->where('type', 'ot_spec_holiday')->value('premium');
    }

    function ot_rd_spec_holiday(){
    	return $this->where('type', 'ot_spec_holiday+rd')->value('premium');
    }

    function ot_reg_holiday(){
    	return $this->where('type', 'ot_reg_holiday')->value('premium');
    }

    function ot_rd_reg_holiday(){
    	return $this->where('type', 'ot_reg_holiday+rd')->value('premium');
    }

    function night_diff(){
    	return $this->where('type', 'night_diff')->value('premium');
    }

    //holiday pay calculations
    function calc_rd($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->rd()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_s_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->s_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_rd_s_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->rd_s_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_reg_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->reg_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_rd_reg_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->rd_reg_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    //Overtime calculations
    function calc_ot_ord($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->ot_ord()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_ot_rd($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->ot_rd()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_ot_s_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->ot_s_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_ot_rd_s_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->ot_rd_spec_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_ot_reg_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->ot_reg_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    function calc_ot_rd_reg_holiday($hourly_rate, $hours){
    	$amount = round(($hourly_rate * ($this->ot_rd_reg_holiday()-1)) * $hours, 2);
    	return $amount;
    }

    //night diff calculations
    function calc_nd_ord($hourly_rate, $hours){
    	$amount = round(($hourly_rate * $this->night_diff()) * $hours, 2);
    	return $amount;
    }

    function calc_nd_rd($hourly_rate, $hours){
    	$amount = round((($hourly_rate * $this->rd()) * $this->night_diff()) * $hours, 2);
    	return $amount;
    }

    function calc_nd_s_holiday($hourly_rate, $hours){
    	$amount = round((($hourly_rate * $this->s_holiday()) * $this->night_diff()) * $hours, 2);
    	return $amount;
    }

    function calc_nd_rd_s_holiday($hourly_rate, $hours){
    	$amount = round((($hourly_rate * $this->rd_s_holiday()) * $this->night_diff()) * $hours, 2);
    	return $amount;
    }

    function calc_nd_reg_holiday($hourly_rate, $hours){
    	$amount = round((($hourly_rate * $this->reg_holiday()) * $this->night_diff()) * $hours, 2);
    	return $amount;
    }

    function calc_nd_rd_reg_holiday($hourly_rate, $hours){
    	$amount = round((($hourly_rate * $this->rd_reg_holiday()) * $this->night_diff()) * $hours, 2);
    	return $amount;
    }
}

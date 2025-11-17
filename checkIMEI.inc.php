<?php
function checkIMEI(string $imei): bool{
	if(!preg_match('/^\d{15}$/', $imei)){
		return false;
	}

	$digits = str_split($imei);
	$sum = 0;
	$checkDigit = (int)array_pop($digits);

	foreach($digits as $i => $d){
		$num = (int)$d;
		if(($i + 1) % 2 == 0){
			$num *= 2;
			if($num > 9){
				$num -= 9;
			}
		}
		$sum += $num;
	}
	$calculatedCheckDigit = (10 - ($sum % 10)) % 10;
	return $checkDigit === $calculatedCheckDigit;
}
?>

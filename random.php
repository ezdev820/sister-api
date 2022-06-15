<?php 

	$comb = "0123456789";
	$shfl = str_shuffle($comb);
	$pwd1 = substr($shfl, 0, 8);
	$pwd2 = substr($shfl, 0, 8);
	echo $pwd1.''.$pwd2;

?>
<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$array = array();
//create an array 
$arrayCount= 25;
for($i=0;$i<$arrayCount;$i++){
	array_push($array,$i);	
}
print_r( $array);
echo "<hr/>";

$outer = 0; // the layer number
$j = 0; // a counter to count array
$s= 0; // a counter for layers
$k = count($array);// count of array
$k1 = sqrt($k); 
$array3 = array();
do{

$k2 = $k-$j;
$array3 = Layer($k2,$j,$array3,$array,$s);
//print_r($array3);
$j += count_j($k2,$s);
$s++;
}while($j < count($array));
echo "<hr/>";
//print_r($array3);
echo "<hr/>";
//skriv ut array
for($a=0;$a<$k1;$a++){
	for($b=0;$b<$k1;$b++){
		echo sprintf("%02d",$array3[$a][$b])." ";
	}
	echo "<br/>";
}
echo "<hr/>";

function count_j($k,$s){ // function  to count J
	$k1 = sqrt($k);
	$k1 = $k1;
	$outer =($k1-1)*4;
	if($outer < 1){
		$outer = 1;
	}
	return $outer;
}
function Layer($k,$j,$array3,$array,$s){
	$k1 = sqrt($k);
	$k1 = $k1+$s;
	$outer =($k1-1)*4;
	if($outer < 1){
		$outer = 1;
	}
	for($i= $s; $i<$k1;$i++){
		$array3[$s][$i] = $array[$j];
		$j++;
		if($j == count($array)){return $array3;break;}
	}
	
	for($i= 1+$s; $i<$k1;$i++){
		$array3[$i][$k1-1] = $array[$j];	
		$j++;
		if($j == count($array)){return $array3;break;}
	}
	for($i= $k1-2;$i>=$s;$i--){
		$array3[$k1-1][$i] = $array[$j];	
		$j++;
		if($j == count($array)){return $array3;break;}
	}
	for($i= $k1-2;$i>$s;$i--){
		$array3[$i][$s] = $array[$j];
		$j++;
		if($j == count($array)){return $array3;break;}
	}
	return $array3;
}

?>
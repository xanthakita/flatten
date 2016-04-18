<?php 
/*
 ====================================
 Jonathan Wagner
 xanthakita@me.com
 ====================================
 FILE NAME:          flatten.php
  TAB SIZE:          4
 SOFT TABS:          NO
 ====================================
 Copywrite @2016
 simple array flattening class returns the nested arrays as a single flat array.
 */

class FlatArray {
	// This class takes an array as input and returns a flattend array
	// the input array can be indexed or associative. If a single value is
	// passed the class simply returns a single element array with 
	// that value.

	public $output = array();
	
	function check_value($input) {
		/* this function checks each element of the array as $input and if its a single value adds taht to the $output array otherwise it calls teh flatten function with the sub array. */ 
		if (is_array($input)) {
			$retval=$this->flatten($input);
		} else {
			$retval=$input;
			$this->output[]=$retval;
		}
	}

	function flatten($input) {
		/* flatten() iterates through the input array checking each value with the check_value funciton to determine if it's an array or a single element. it also checks the input value and if its a single string or integer returns that to the output array */
		$retval=array();
		$count=0;
		// var_dump($input);
		if (is_array($input)){
			foreach($input as $y) {
				$retval[$count++]=$this->check_value($y);
			}
		} else {
			$this->output=$input;
		}
	}
}

// $ugly= array(0,1,2,array(3,4,5), array(6,7,array(8,9,10)),11,12);
$ugly = array('a', 'b', 'c', array(3,4,5),'d','e',array(6,7,array('f','g')));
// $ugly = array('a'=>1,'b'=>2,'c'=>3, array('d'=>4,'e'=>5),'f'=>6);
// $ugly=100;

echo "Ugly array:\n\r";
foreach($ugly as $u){
	echo "$u\t";
}
echo "\n\r\n\r";
$flat = new FlatArray;
$flat->flatten($ugly);

echo "Flat array:\n\r";
foreach($flat->output as $z){
	echo "$z\t";
}
echo "\n\r";

?>

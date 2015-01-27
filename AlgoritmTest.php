<?php
require ('algoritm.php');

class AlgoritmTest extends PHPUnit_Framework_TestCase {

	function testQuicksort(){
		$t = new Algoritm(array(3,2,1));
		$t->quicksort();
		$this->assertEquals(array(1,2,3), $t->array);
	}

	function testQuicksortSecond(){
		$t = new Algoritm(array(11,6,55,8,60,5));
		$t->quicksort();
		$this->assertEquals(array(5,6,8,11,55,60), $t->array);
	}

	function testQuickSortThird(){
		$t = new Algoritm(array(11, 2, 3, 90, 100, 3, 1));
		$t->quicksort();
		$this->assertEquals(array(1 ,2 ,3 ,3, 11, 90 ,100), $t->array);
	}

	function testMaxIndexEqualAll(){
		$arr = array(1,1,1,1,1,1,1,1);
		$t = new Algoritm($arr);
		$max_index = 0;
		$this->assertEquals($max_index, $t->max_index(0, count($arr) - 1));
	}

	function testMaxIndexEmptyArr(){
		$arr = array();
		$t = new Algoritm($arr);
		$this->setExpectedException(
			'Exception', 'Error array is empty', 1
		);
		$t->max_index(1, 20);
	}

	function testMaxIndexInEnd(){
		$arr = array(1,2,3,4,5,6,7,8);
		$t = new Algoritm($arr);
		$max_index = 7;
		$this->assertEquals($max_index, $t->max_index(0, count($arr) - 1));
	}

	function testMaxIndexInStart(){
		$arr = array(8,2,3,4,5,6,7,1);
		$t = new Algoritm($arr);
		$max_index = 0;
		$this->assertEquals($max_index, $t->max_index(0, count($arr) - 1));
	}

	function testMaxIndexInMiddle(){
		$arr = array(1,2,3,4,8,6,7,5);
		$t = new Algoritm($arr);
		$max_index = 4;
		$this->assertEquals($max_index, $t->max_index(0, count($arr) - 1));
	}

	function testSwapZeroIndex(){
		$arr = array(1,2,3,4);
		$t = new Algoritm($arr);
		$t->swap(0,0);
		$this->assertEquals($arr, $t->array);
	}

	function testSwap(){
		$arr = array(1,2,3,4);
		$t = new Algoritm($arr);
		$t->swap(0,3);
		$this->assertEquals(array(4,2,3,1), $t->array);
	}
}
?>
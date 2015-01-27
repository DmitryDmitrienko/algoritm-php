<?php

trait SuperClass{
	function __get($property){
		$method = "get{$property}";
		if(method_exists($this, $method)){
			return $this->$method();
		}
	}
	function __set($property, $value){
		$method = "set{$property}";
		if(method_exists($this, $method) and !is_null($value)){
			$this->$method($value);
		}
		
	}
}

class Algoritm{
	use SuperClass;
	private $arr = array();

	function prinrArr(){
		foreach ($this->arr as $val) {
			echo "<p>";
				echo " ".$val." ";
			echo "</p>\n";
		}
	}
	function __construct($arr){
		$this->arr = $arr;
	}
	function getArray(){return $this->arr;}
	function setArray($arr){$this->arr = $arr;}
	
	function quicksort($l=0, $r=0){
		$i = null; // обозначает левую границу 
		$j = null; // обозначет праую границу
		$v = null; // значение в середине массива
		// проверяем массив на пустоту
		// если массив пустой то и делать с ним нечего
		if(count($this->arr) <= 0)
			return;
		// если нет правой границы
		if($r == 0){
			$r = $j = count($this->arr) - 1;
		}
		else $j = $r;
		$i = $l;
		// определяем среднее значение
		$v = $this->arr[($i+$j)/2];
		// cортировка
		do{
			// начиная от левой границы ищем индекс
			// максимального значения относительно значения в середине
			while($this->arr[$i] < $v) $i++;
			// начиная от правой границы ищем индекс
			// минимального значения относительно значения в середине
			while($this->arr[$j] > $v) $j--;
			// если сдвиг не зашел за границы
			if($i <= $j) {
				// если индекс слева действительно больше индекса слева
				if($this->arr[$i] > $this->arr[$j]){
					// меняем местами значения 
					$this->swap($i, $j);
				}
				// сдвигаем границы
				$i++;
				$j--;
			}
		}while($i < $j);
		// если границы не пересеклись сортируем новые куски массива
		if($i < $r) $this->quicksort($i, $r);
		if($j > $l) $this->quicksort($l, $j);
	}

	function bubblesort(){
		$len = count($this->arr);
		for($i = 0 ; $i < $len-1; $i++){
			for($j = 0; $j < $len - $i - 1 ; $j++){
				if($this->arr[$j] > $this->arr[$j+1]){
					$this->swap($j, $j+1);
				}
			}
		}
	}

	function max_index($index_start, $index_end){
		$this->checkParametersQuicksort($index_start, $index_end);
		$this->checkArray($this->arr);
		$index_diff = $index_end - $index_start;
		if ($index_diff === 0)
			return $index_start;
		$max_index = $index_start;
		for($index = $index_start; $index <= $index_end; $index++){
			if($this->arr[$index] > $this->arr[$max_index]){
				$max_index = $index;
			}
		}
		return $max_index;
	}
	function min_index($index_start, $index_end){
		$this->checkParametersQuicksort($index_start, $index_end);
		$this->checkArray($this->arr);
		$index_diff = $index_end - $index_start;
		if ($index_diff === 0)
			return $index_start;
		$min_index = $this->arr[$index_start];
		for($index = $index_start; $index <= $index_end; $index++){
			if($this->arr[$index] < $this->arr[$min_index]){
				$min_index = $index;
			}
		}
		return $min_index;
	}

	function swap($index1, $index2){
		if($index1 < 0 or $index2 < 0){
			throw new Exception("Error indexes swap (index1: {$index1},
			 index2: {$index2})", 1);
		}
		if ($index1 === $index2)
			return;
		$tmp = $this->arr[$index1];
		$this->arr[$index1] = $this->arr[$index2];
		$this->arr[$index2] = $tmp;
	}

	private function checkParametersQuicksort($index_start, $index_end){
		$index_diff = $index_end - $index_start;
		if ($index_start < 0 || $index_end < 0 || $index_diff < 0) {
			throw new Exception("Error indexes sort (index_start: {$index_start},
			 index_end: {$index_end})", 1);
		}
	}
	private function checkArray($arr){
		if(empty($arr))
			throw new Exception("Error array is empty", 1);
	}
}
?>
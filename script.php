<?php
$inputData = $_GET['matrix'];
$size = count($_GET['matrix']);
$array = array();
$tmpInt = 0;

$Vald = 0;
for ($i = 0; $i < $size; $i++) {
	$splitPieceOfData = explode(" ", $inputData[$i]);

	$array[$i] = Array($size);

	for ($j = 0; $j < count($splitPieceOfData); $j++) {
		$array[$i][$j] = Array(2);

		if (!is_numeric($splitPieceOfData[$j]) && $splitPieceOfData[$j] != "i"){
			$Vald = 1;
		}
		else if ($i == $j) {
			$array[$i][$j][0] = "0";
			$array[$i][$j][1] = ($i + 1) . " " . ($j + 1);
		}
		else {
			$array[$i][$j][0] = $splitPieceOfData[$j];
			$array[$i][$j][1] = ($i + 1) . " " . ($j + 1);
		}
	}

	if (count($splitPieceOfData) != count($inputData)) {
		$Vald = 2;
	}
}
if ($Vald == 0) {
	for ($iter = 0; $iter < count($inputData); $iter++) {
		$arrayTmp = $array;

		for ($i = 0; $i < count($inputData); $i++) {
			for ($j = 0; $j < count($inputData); $j++) {
				if (is_numeric($array[$i][$iter][0]) && is_numeric($array[$iter][$j][0])) {
					$tmpInt = (int)$array[$i][$iter][0] + (int)$array[$iter][$j][0];
					if ($tmpInt < $array[$i][$j][0] || $array[$i][$j][0] == "i") {
						$array[$i][$j][0] = $tmpInt;
						$array[$i][$j][1] = $array[$i][$iter][1] . " " . substr($array[$iter][$j][1], 2);
					}
				}
			}
		}

		for ($i = 0; $i < count($inputData); $i++) {
			for ($j = 0; $j < count($inputData); $j++) {
				if ($array[$i][$j] < $array[$i][$j]) {
					$array[$i][$j] = $array[$i][$j];
				}
			}
		}	
	}
	for ($i = 0; $i < count($inputData); $i++) {
		for ($j = 0; $j < count($inputData); $j++) {
			if ($array[$i][$j][0] == "i") {
				print_r("0 ");
			}
			else {
				print_r("1 ");
			}
		}
		print_r("<br>");
	}
}
else if ($Vald == 1){
	print_r("В матрице могут быть только числа либо буква \"i\"!");
}
else {
	print_r("Матрица должна быть квадратной!");
}
?>
<?php
$dir = "img/slider";
$arr = scandir($dir);
// echo "<pre>";
//var_dump($arr);

for($i = 0; $i <count($arr); $i++){
$newarr = explode(".", $arr[$i]);
					
if($newarr[1] == "jpg"){
// echo "<br>";
//echo $arr[$i];
	sort($arr, SORT_NUMERIC);
echo "<div class = 'section_item'>"."<img src ='"."./img/slider/".$arr[$i]."'</img></div>";
	}
}
?>
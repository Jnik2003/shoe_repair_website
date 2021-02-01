<?php

$query = "select id, description from category where 1";
$resultCat = select($query);
//var_dump($resultCat[0]['id']);


$forma = "<select class='sel' name='cid' required>";
$forma .= "<option value=''></option>";
for($i = 0; $i < count($resultCat); $i++){

	$forma .= "<option value='".$resultCat[$i]['description']."'>".$resultCat[$i]['description']."";

$forma .= "</option>";
}

$forma .= "</select>";


echo $forma;


?>
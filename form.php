<?php
// форма на php
// получим в массив данные из таблицы категории и отправим $_POST['sel'] на страницу cat
$query = "select id, description from category where 1";
$resultCat = select($query);
//var_dump($resultCat[0]['id']);

$forma = "<form action='cat' method='POST'  class='form_filter'>";
$forma .= "<select class='sel' name='sel'>";
$forma .= "<option value=''></option>";
for($i = 0; $i < count($resultCat); $i++){

	$forma .= "<option value='".$resultCat[$i]['description']."'>".$resultCat[$i]['description']."";

$forma .= "</option>";
}

$forma .= "</select>";
$forma .= "<input type='submit' value='Filtras' class='btn_filter'>";
$forma .= "</form>";

echo $forma;


?>
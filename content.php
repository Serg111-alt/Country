<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php
ob_start();
include_once "action.php";
include "header.php";




$str_form_sort = '<h3 style = color:white;>Сортировать по:</h3>
<form  name="sortForm"  method="post">
 <select name="sort" size="1">
   <option value="name">Названию страны</option>
   <option value="capital">Названию столицы</option>
   <option value="area">Площади</option>
   <option value="population2000">Населению за 2000 год</option>
   <option value="population2010">Населению за 2010 год</option>
   <option value="population">Среднему населению</option>
 </select>
 <input name="gosort" type="submit" value="Подтвердить">
</form>';
echo $str_form_sort;

if (isset($_POST['gosort'])) {
    sorting($_POST['sort']);
}

$out = out_arr();

if (count($out) > 0) {
    foreach ($out as $row) {
        echo $row;
    }
} else
    echo "Нет данных...";


$str_form_search = "<h3 style = color:white;>Поиск:</h3>
			<form  name='searchForm'   method='post' onSubmit='return overify_login(this);' >
 			 <input type='text' name='search'>
 			 <input type='submit' name='gosearch' value='Подтвердить'>
 			 <input type='submit' name='clear' value='Сбросить'>
 		     </form>";

echo $str_form_search;

if (isset($_POST['gosearch'])) {
    $data = test_input($_POST['search']);
    $out = out_search($data);


    if (count($out) > 0) {
        foreach ($out as $row) {
            echo $row;
        }
    } else
        echo "Ничего не найдено...";
    

    
}
    ?>
</body>
</html>

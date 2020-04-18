<?php
include "db.php";

function out_arr() {
    global $countries;
    $arr_out = array();
    $arr_out[] = "<table class='out' border = '1' style = color:white;background:black;>";
    $arr_out[] = "<tr><td>№</td><td>Страна</td><td>Столица</td><td>Площадь</td><td>Население за 2019 год</td><td>Население за 2020 год</td><td>Среднее население</td></tr>";
    foreach ($countries as $country) {
        static $i = 1;
       
        $str = "<tr>";
        $str .= "<td>" . $i . "</td>";
        foreach ($country as $key => $value) {
            if (!is_array($value))
                $str .= "<td>$value</td>";
            else {
                foreach ($value as $k => $v)
                    $str .= "<td>$v</td>";
            }
        }
        $str .= "<td>" . (array_sum($country['population']) / count($country['population'])) . "</td>";
        $str .= "</tr>";
        $arr_out[] = $str;
        $i++;
    }
    $arr_out[] = "</table>";
    return $arr_out;
}

function out_arr_search(array $arr_index = null) {
    global $countries; 
    $arr_out = array();
    $arr_out[] = "<table class='out' border = '1' style = color:white;background:black;>";
    $arr_out[] = "<tr><td>№</td><td>Страна</td><td>Столица</td><td>Площадь</td><td>Население за 2019 год</td><td>Население за 2020 год</td><td>Среднее население</td></tr>";
    foreach ($countries as $index => $country) {
        if ($arr_index != null && in_array($index, $arr_index)) {
            static $i = 1;
            $str = "<tr>" . "<td>" . $i . "</td>";
            foreach ($country as $key => $value) {
                if (!is_array($value)) {
                    $str .= "<td>$value</td>";
                } else {
                    foreach ($value as $k => $v) {
                        $str .= "<td>$v</td>";
                    }
                }
            }
            $str .= "<td>" . (array_sum($country['population']) / count($country['population'])) . "</td></tr>";
            $arr_out[] = $str;
            $i++;
        }
    }
    $arr_out[] = "</table>";
    return $arr_out;
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function out_search($data) {
    global $countries;   
    $arr_index = array();
    foreach ($countries as $country_number => $country) {
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                if (strstr($value, $data)){
                    $arr_index[] = $country_number;
                }
            }
            else {
                foreach ($value as $k => $v) {
                    if (strstr($v, $data) || strstr($k, $data)) {
                        $arr_index[] = $country_number;
                    }
                }
            }
        }
    }
    return out_arr_search(array_unique($arr_index));
}

function check_autorize($log, $pas) {
    global $users;
    if (in_array($log, $users)) {
        return true;
    } else {
        return false;
    }
}

function check_admin($log, $pas) {
    global $users;
    if (in_array($log, $users) && ($pas == $users["admin"])) {
        return true;
    } else {
        return false;
    }
}

function check_log($log) {
    if ($log == "admin") {
        return true;
    } else {
        return false;
    }
}

function name($a, $b) { 
    if ($a["name"] < $b["name"])
        return -1;
    elseif ($a["name"] == $b["name"])
        return 0;
    else
        return 1;
}

function capital($a, $b) { 
    if ($a["capital"] < $b["capital"])
        return -1;
    elseif ($a["capital"] == $b["capital"])
        return 0;
    else
        return 1;
}

function area($a, $b) { 
    if ($a["area"] < $b["area"])
        return -1;
    elseif ($a["area"] == $b["area"])
        return 0;
    else
        return 1;
}

function population2000($a, $b) { 
    if ($a["population"]["2019"] < $b["population"]["2019"])
        return -1;
    elseif ($a["population"]["2019"] == $b["population"]["2019"])
        return 0;
    else
        return 1;
}

function population2020($a, $b) { 
    if ($a["population"]["2020"] < $b["population"]["2020"])
        return -1;
    elseif ($a["population"]["2020"] == $b["population"]["2020"])
        return 0;
    else
        return 1;
}

function population($a, $b) {  
    if ($a["population"]["2019"] + $a["population"]["2020"] < $b["population"]["2019"] + $b["population"]["2020"])
        return -1;
    elseif ($a["population"]["2019"] + $a["population"]["2020"] == $b["population"]["2019"] + $b["population"]["2020"])
        return 0;
    else
        return 1;
}

function sorting($p) {
    global $countries;
    uasort($countries, $p);
}

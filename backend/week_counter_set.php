<?php
session_start();

$tri = $_POST['tri'];
$week_counter = $_SESSION['week_counter'];

if ($tri == 'next') {
    $_SESSION['week_counter'] = $week_counter + 1;
}
else if ($tri == 'prev' && $week_counter > 0){
    $_SESSION['week_counter'] = $week_counter - 1;
}
else if ($tri == 'current') {
    $_SESSION['week_counter'] = 0;
}
?>
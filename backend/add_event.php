<?php
include "dbconnect.php";
session_start();

$event_name = $_POST['event_name'];
$period = $_POST['period'];
$event_place = $_POST['event_place'];
$description = $_POST['description'];
$event_tag = isset($_POST['event_tag']) ? $_POST['event_tag'] : array();
$date = $_POST['event_date'];
$event_start = $_POST['event_start'];
$event_end = $_POST['event_end'];

if ($event_end >= $event_start) {
    if ($period == 'Единожды'){
        $sql = "INSERT INTO `events` (user_id, event_name, event_date, event_start, event_end, event_period, event_place, event_description) VALUES (:user_id,
        :event_name, :event_date, :event_start, :event_end, :event_period, :event_place, :event_description)";
        $result = $conn->prepare($sql);
        $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $date,
                        ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
    }

    else if ($period == 'Каждую неделю') {
        for ($i = 0; $i <= 10; $i++){
            $sql = "INSERT INTO `events` (user_id, event_name, event_date, event_start, event_end, event_period, event_place, event_description) VALUES (:user_id,
                    :event_name, :event_date, :event_start, :event_end, :event_period, :event_place, :event_description)";
            $result = $conn->prepare($sql);
            $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $date,
                            ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
            $date = date('Y-m-d', strtotime("$date + 7 days"));
        }
    }

    else if ($period == 'Каждые 2 недели') {
        for ($i = 0; $i <= 10; $i++){
            $sql = "INSERT INTO `events` (user_id, event_name, event_date, event_start, event_end, event_period, event_place, event_description) VALUES (:user_id,
                    :event_name, :event_date, :event_start, :event_end, :event_period, :event_place, :event_description)";
            $result = $conn->prepare($sql);
            $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $date,
                            ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
            $date = date('Y-m-d', strtotime("$date + 14 days"));
        }
    }
}
else {
    if ($period == 'Единожды'){
        $sql = "INSERT INTO `events` (user_id, event_name, event_date, event_start, event_end, event_period, event_place, event_description) VALUES (:user_id,
        :event_name, :event_date, :event_start, :event_end, :event_period, :event_place, :event_description)";
        $result = $conn->prepare($sql);
        $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $date,
                        ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
        $second_date = date('Y-m-d', strtotime("$date + 1 days"));
        $event_start = '00:00';
        $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $second_date,
                        ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
    }

    else if ($period == 'Каждую неделю') {
        for ($i = 0; $i <= 10; $i++){
            $sql = "INSERT INTO `events` (user_id, event_name, event_date, event_start, event_end, event_period, event_place, event_description) VALUES (:user_id,
                    :event_name, :event_date, :event_start, :event_end, :event_period, :event_place, :event_description)";
            $result = $conn->prepare($sql);
            $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $date,
                            ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
            $second_date = date('Y-m-d', strtotime("$date + 1 days"));
            $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $second_date,
                            ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
            $date = date('Y-m-d', strtotime("$date + 7 days"));
        }
    }

    else if ($period == 'Каждые 2 недели') {
        for ($i = 0; $i <= 10; $i++){
            $sql = "INSERT INTO `events` (user_id, event_name, event_date, event_start, event_end, event_period, event_place, event_description) VALUES (:user_id,
                    :event_name, :event_date, :event_start, :event_end, :event_period, :event_place, :event_description)";
            $result = $conn->prepare($sql);
            $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $date,
                            ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
            $second_date = date('Y-m-d', strtotime("$date + 1 days"));
            $result->execute(array(':user_id' => $_SESSION['user_id'], ':event_name' => $event_name, ':event_date' => $second_date,
                            ':event_start' => $event_start, ':event_end' => $event_end, ':event_period' => $period, ':event_place' => $event_place, ':event_description' => $description));
            $date = date('Y-m-d', strtotime("$date + 14 days"));
        }
    }
}
echo(1);
?>
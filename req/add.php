<?php

    require_once '../config/DB.php';


    $conn = new mysqli('localhost', 'root', '', 'vio');

    if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";


        $location = $_POST['location'];
        $capacity = $_POST['capacity']; 
        $no_of_batteries = $_POST['no_of_batteries']; 
        $no_of_panels = $_POST['no_of_panels']; 
        $no_of_st_lights = $_POST['no_of_st_lights']; 
        $date = $_POST['date']; 
        $service_rendered = $_POST['service_rendered']; 
        $remarks = $_POST['remarks'];

        
        if (empty($location) || empty($capacity) || empty($no_of_batteries) || empty($no_of_panels) || empty($no_of_st_lights) || empty($date) || empty($service_rendered) || empty($remarks) ) {
            echo json_encode(['msg' => "Please fill in all fields!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);
        } else {
            $sql = "INSERT INTO `solar_installations` (`location`, `capacity`, `no_of_batteries`, `no_of_panels`, `no_of_st_lights`, `date`, `service_rendered`, `remarks` ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssiiisss', $location, $capacity, $no_of_batteries, $no_of_panels, $no_of_st_lights, $date, $service_rendered, $remarks);
            if ($stmt->execute()) {
                echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
            }
        }
    
    }
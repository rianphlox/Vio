<?php
// echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
// echo json_encode(['msg' => "Please fill in all fields!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);

require_once '../config/DB.php';
$db = new DB();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $vin = $_POST['vin'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_chassis_no = $_POST['vehicle_chassis_no'];
    $location = $_POST['location'];
    
    if (!$db->createVehicle($vin, $vehicle_type, $vehicle_chassis_no, $location)) {
        echo json_encode(['msg' => "Please fill in all fields!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);
    } else {
        echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
    }

}

<?php   
    require_once '../config/DB.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $vin = $_POST['vin'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_chassis_no = $_POST['vehicle_chassis_no'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $service_rendered = $_POST['service_rendered'];
    $remarks = $_POST['remarks'];

    function addToVehicleDB() {
        $conn = new mysqli('localhost', 'root', '', 'vio');
        $sql = "INSERT INTO `vehicles` (`vin`, `vehicle_type`, `vehicle_chassis_no`, `location`, `date`, `service_rendered`, `remarks`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $vin, $vehicle_type, $vehicle_chassis_no, $location, $date, $service_rendered, $remarks);

        if ($stmt->execute()) {
            echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
        }
    }

    if (empty($vin) || empty($vehicle_type) || empty($vehicle_chassis_no) || empty($location) || empty($date) || empty($service_rendered) || empty($remarks)) {
        echo json_encode(['msg' => "Please fill in all fields!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);
    } else {
        // Check if table with vin exists        
        $sql = "INSERT INTO `vehicles` (`vin`, `vehicle_type`, `vehicle_chassis_no`, `location`, `date`, `service_rendered`, `remarks`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $vin, $vehicle_type, $vehicle_chassis_no, $location, $date, $service_rendered, $remarks);

        if ($stmt->execute()) {
            echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
        }

        // added to general table
        // check if record table is created
        $table_name = $vin . "_records";
        $check_table_sql = "SHOW TABLES LIKE '$table_name'";
        $table_exists = $conn->query($check_table_sql)->num_rows > 0;

        if (!$table_exists)  {
            $sql = "CREATE TABLE `$table_name` (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `date` DATE NOT NULL,
                service_rendered TEXT NOT NULL,
                remarks TEXT NOT NULL)";
            if ($conn->query($sql)) {
                $new_sql = "INSERT INTO `$table_name` (`date`, `service_rendered`, `remarks`) VALUES ('$date', '$service_rendered', '$remarks')";
                if ($conn->query($new_sql)) {
                    echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
                } else {
                    echo json_encode(['msg' => "Error adding data!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);
                }
            }

        } 
            
        
    }
}
?>

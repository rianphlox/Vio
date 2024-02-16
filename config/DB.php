<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


class DB
{
    public $host;
    public $user;
    public $password;
    public $dbname;
    public $conn;


    public function __construct($host = 'localhost', $user = 'root', $password = '', $dbname = 'vio')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname) or die("Failed to connect to MySQLi" . $this->conn->connect_error);
    }

    public function sanitize($field)
    {
        return htmlentities(trim($field));
    }

    public function createVehicle($vin, $vehicle_type, $vehicle_chassis_no, $location)
    {
        // check if empty
        if (empty($vin) || empty($vehicle_type) || empty($vehicle_chassis_no) || empty($location)) {
            return false;
        } else {
            $vin = $this->sanitize($vin);
            $vehicle_type = $this->sanitize($vehicle_type);
            $vehicle_chassis_no = $this->sanitize($vehicle_chassis_no);
            $location = $this->sanitize($location);

            $sql = "INSERT INTO `vehicles` (`vin`, `vehicle_type`, `vehicle_chassis_no`, `location`) VALUES (?, ?, ?, ?);";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ssss', $vin, $vehicle_type, $vehicle_chassis_no, $location);
            if ($stmt->execute()) {
                $this->createVehicleProfile($vin);
                return true;
            }
        }
    }


    public function createVehicleProfile($vin) {
        $tableName = $vin . "_records";
        $sql =  "CREATE TABLE $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            date DATE,
            service_rendered VARCHAR(255),
            h_mtce_attestation VARCHAR(255),
            driver_attestation VARCHAR(255),
            remarks VARCHAR(255)
        );";
        $this->conn->query($sql);

    }
}

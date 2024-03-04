<?php

    $conn = new mysqli('localhost', 'root', '', 'vio') or die("Failed to connect to Mysqli". $conn->connect_error);


    $id = $conn->real_escape_string(htmlentities($_GET['id']));
    $sql = "UPDATE `solar_installations` SET `MTCE_Attestation` = 'yes' WHERE `solar_installations`.`id` = ?; " ;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header("Location: solars");
<?php
$conn = new mysqli('localhost', 'root', '', 'vio');
if (!$conn) {
  echo "Failed to connect to Mysqli" . $conn->connect_error;
} else {
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    // get form details

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $user = htmlspecialchars(htmlentities($_POST['username']));
        $pass = htmlspecialchars(htmlentities($_POST['password']));
        // check database if username exists in database
        $sql = "select id, username, password from users where username = ?";
        $stmt = $conn->prepare($sql );
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->bind_result($id, $username, $password);
        $stmt->fetch();
        if (!$id) {
        //   echo "username does not exist";
          echo json_encode(['msg' => "Username does not exist!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);
        } else {
          // check if password is correct
          if ($password == $pass) {
            session_start();
            $_SESSION['username'] = $username;
            echo json_encode(['msg' => "Success", 'msgClass' => 'success', 'icon' => 'nc-check-2']);
            } else {
              echo json_encode(['msg' => "Incorrect Details!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);

            }
        }

    } else {
        echo json_encode(['msg' => "Please fill in all fields!", 'msgClass' => 'danger', 'icon' => 'nc-simple-remove']);
    }

  }

}
<?php
{
$caller_id = $_POST['caller_id'];
$phone = $_POST['phone'];
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$state = $_POST['state'];
$Zip_code = $_POST['Zip_code'];
$Date_of_birth = $_POST['Date_of_birth'];
$Email = $_POST['Email'];
$Ip_address = $_POST['Ip_address'];

$url = 'http://localhost/foam/';
$homepage = file_get_contents($url);
        echo $homepage;

        $conn = new mysqli('localhost','root','','test');

        if ($conn->connect_error) {
            die('Could not connect to the database : '.$conn->connect_error);
        }
        else {
            $stmt = $conn->prepare("insert into form_data(caller_id, phone, First_Name, Last_Name, Address, City, state,  Zip_code, Date_of_birth, Email, Ip_address) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iisssssissd" ,$caller_id, $phone, $First_Name, $Last_Name, $Address, $City, $state,  $Zip_code, $Date_of_birth, $Email, $Ip_address);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }

    }
    ?>
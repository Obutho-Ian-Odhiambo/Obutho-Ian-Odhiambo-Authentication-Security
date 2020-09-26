<?php
    $email = $_POST['patientEmail'];
    $gender = $_POST['patientGender'];
    $id = $_POST['patientId'];
    $name = $_POST['patientName'];
    $password = $_POST['patientPassword'];

    // echo $email;
    // echo $gender;
    // echo $id;
    // echo $name;
    // echo $password;


    $connect = new mysqli("localhost", "root", "12valene", "hospital");

    if ($connect->connect_error){
        die("Failed to connect : ".$connect->connect_error);
    } else 
    {
        $sql = "INSERT INTO `patients` (`passcode`, `email`, `gender`, `name`, `id`)
                VALUES ('$password', '$email', '$gender', '$name', $id)";

        if ($connect->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
              echo "Error: " . $sql . "<br>" . $connect->error;
        }

    

$connect->close();

    }
?>
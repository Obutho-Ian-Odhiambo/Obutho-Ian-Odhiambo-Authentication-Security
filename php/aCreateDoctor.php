<?php
    $email = $_POST['doctorEmail'];
    $gender = $_POST['doctorGender'];
    $id = $_POST['doctorId'];
    $name = $_POST['doctorName'];
    $password = $_POST['doctorPassword'];

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
        $sql = "INSERT INTO `doctors` (`password`, `email`, `gender`, `name`, `id`)
                VALUES ('$password', '$email', '$gender', '$name', $id)";

        if ($connect->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
              echo "Error: " . $sql . "<br>" . $connect->error;
        }

$connect->close();

    }
?>
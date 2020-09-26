<?php

    $connect = new mysqli("localhost", "root", "12valene", "hospital");

    if ($connect->connect_error){
        die("Failed to connect : ".$connect->connect_error);
    } else 
    {

        $sql = "SELECT 'email', 'name', 'gender' FROM 'patients'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Patient Name : " . $row["name"]. " - Gender: " . $row["gender"]. " " . $row["email"]. "<br>";
            }
        } else {
                echo "0 results";
        }
    $connect->close();
    }
?>
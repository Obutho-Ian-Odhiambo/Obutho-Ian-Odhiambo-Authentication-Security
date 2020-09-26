<?php
    $email = $_POST['adminEmail'];
    $password = $_POST['adminPassword'];

    $connect = new mysqli("localhost", "root", "12valene", "hospital");

    if ($connect->connect_error){
        die("Failed to connect : ".$connect->connect_error);
    } else 
    {
        $stmt = $connect->prepare("select * from admin where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result-> fetch_assoc();
            if($data['password'] === $password){
                // echo "<h2> Login successful </h2>";
                header("location: ../adminInterface.html");
            }else{ }
        }else{
            echo "<h2> Invalid email or password </h2>";
        }
    }
?>
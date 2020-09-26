<?php
    $email = $_POST['patientEmail'];
    $password = $_POST['patientPassword'];

    $connect = new mysqli("localhost", "root", "12valene", "hospital");

    if ($connect->connect_error){
        die("Failed to connect : ".$connect->connect_error);
    } else 
    {
        $stmt = $connect->prepare("select * from patients where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result-> fetch_assoc();
            if($data['passcode'] === $password){
                // echo "<h2> Login successful </h2>";
                // header("location: ../doctorInterface.html");

                $sql = "SELECT email, 'name', gender FROM patients";
                $result = $connect->query($sql);
        
                if ($result->num_rows > 0) {
                  // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "Patient Name : " . $row["name"]. " - Gender: " . $row["gender"]. " " . $row["email"]. "<br>";
                    }
                } else {
                        echo "0 results";
                }

            }else{ }
        }else{
            echo "<h2> Invalid email or password </h2>";
        }
    }
?>
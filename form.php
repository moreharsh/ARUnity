<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact US</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

          <?php

          $name = $_POST['fname'];
          $email = $_POST['email'];
          $message = $_POST['message'];

          if(!empty($name) || !empty($email) || !empty($message) ) {



            $host = "localhost";
            $dbUsername = "root";
            $password = "";
            $dbname = "arform";

            $conn = new mysqli($host, $dbUsername, $password, $dbname);

            if(mysqli_connect_error()) {
              die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            } else {
                
                $INSERT = "INSERT INTO form (name, email, message) values (?, ?, ?)";

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sss",$name,$email,$message);
                $stmt->execute();
                header("Location: Contact.html");
                $stmt->close();
                $conn->close();
            }


          } else {
            echo "All Field are Required!";
            die();
          }

          ?>


</body>
</html>

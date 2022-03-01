<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'JustinE@11235';
    $db_name = 'cam2net_application';

    $con = new mysqli($host,$username,$password,$db_name);

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $complete_address = $_POST['complete_address'];
    $internet_plan = $_POST['internet_plan'];

    if($con->connect_error){
        echo $con->connect_error;
    }else{
        $SELECT = "SELECT email FROM `applicants_list` WHERE email = ? Limit 1";
        $qry = "INSERT INTO `applicants_list`(`email`, `first_name`, `last_name`, `contact_number`, `complete_address`, `inrternet_plan`) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();
    
            $stmt = $con->prepare($qry);
            $stmt->bind_param("ssssss", $email, $first_name, $last_name, $contact_number, $complete_address, $internet_plan);
            $stmt->execute();
            echo "Application Submitted, We will contact you for confirmation. Thank You";
        }else{
            echo "Someone already applied using this email...please use another email";
        }
        $stmt->close();
        $con->close();
    }
?>

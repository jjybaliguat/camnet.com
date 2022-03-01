<?php

function connection(){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'cam2net_application';

    $con = new mysqli($host,$username,$password,$db_name);

    if($con->connect_error){
        echo $con->connect_error;
    }else{
        return $con;
    }
}
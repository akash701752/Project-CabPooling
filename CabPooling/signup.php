<?php
    $db_host = 'localhost:3307' ;
    $db_user = 'root' ;
    $db_password = '';
    $db_name = 'signupdatabase';
    $firstname = $_POST['firstname'] ;
    $lastname = $_POST['lastname'] ;
    $password = $_POST['password'] ;
    $dob = $_POST['dob'] ;
    $gender = $_POST['gender'] ;
    $contact = $_POST['contact_number'] ;
    $email = $_POST['email'] ;
    $city = $_POST['city'] ;
    
    $pincode = $_POST['pincode'] ;

    //database connection
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name) ;
    // $conn=mysqli_connect($servername, $username, $password);

    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error) ; 
    }
    else{
        $stmt = $conn->prepare("INSERT INTO signupdatabase (firstname,lastname,password,gender,dob,contact,email,city,pincode) VALUES(?,?,?,?,?,?,?,?,?)") ;
        $stmt->bind_param("sssssissi",$firstname,$lastname,$password,$gender,$dob,$contact,$email,$city,$pincode) ;
        $stmt->execute() ;
        echo "Signed Up Succesfully" ;
        $stmt->close() ;
        $conn->close() ;
    }

?>
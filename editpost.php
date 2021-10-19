<?php
     require_once 'db/conn.php';

     //get values from post operation
     $id = $_GET['id'];
    $results = $crud->getAttendeeDetails($id);
     if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['attendee_id'];
        $fname = $_POST ['firstname'];
        $lname = $_POST ['lastname'];
        $dob = $_POST ['dob'];
        $contact = $_POST ['contact'];
        $email = $_POST ['email'];
        $specialty = $_POST ['specialty'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        //Path for the file. Avatar is the name of the input and name is the image attribute
        $destination = $target_dir . $contact . '.' .$ext;
        move_uploaded_file($orig_file,$destination);
        
        $result = $crud->editAttendee($id, $fname, $lname, $dob, $contact, $email, $specialty, $destination);
            //if $result is succesfull redirect to index.php
            if($result){
                header("Location: viewrecords.php");
            }else{
                include 'includes/errormsg.php';
            }
    }else{
        echo 'error';
    }










?>
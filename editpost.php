<?php
     require_once 'db/conn.php';

     //get values from post operation
     if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['attendee_id'];
        $fname = $_POST ['firstname'];
        $lname = $_POST ['lastname'];
        $dob = $_POST ['dob'];
        $contact = $_POST ['contact'];
        $email = $_POST ['email'];
        $specialty = $_POST ['specialty'];

        $result = $crud->editAttendee($id, $fname, $lname, $dob, $contact, $email, $specialty);
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
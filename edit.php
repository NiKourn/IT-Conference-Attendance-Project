<?php
$title = 'Edit Record';
require_once 'header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';


$results = $crud->getSpecialties();
if(!isset($_GET['id'])){
    include 'includes/errormsg.php';
    header("Location: viewrecords.php");
}else{
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
    
    if (is_bool($attendee)){
      echo 'ID is Invalid. Please enter a valid ID';

    }else{
        require 'includes/edit-form.php';
 } // else close 
 
 require_once 'footer.php';

}
?>

<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';


    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST ['firstname'];
        $lname = $_POST ['lastname'];
        $dob = $_POST ['dob'];
        $contact = $_POST ['contact'];
        $email = $_POST ['email'];
        $specialty = $_POST ['specialty'];
        //Call function to insert and track if success or not
        $isSuccess = $crud->insert($fname, $lname, $dob, $contact, $email, $specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);

        if ($isSuccess){
            //calling static class that way
            SendEmail::SendMail($email, 'Welcome to IT Conference 2021', 'You have succesfully registered for this year\'s IT conference');
            include 'includes/successmsg.php';


        }else{
            include 'includes/errormsg.php';
            

        }
    }
?>
<!-- Prints out values that where passed to the action page using GET method
    
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php //echo $_GET['lastname'] . ' ' . $_GET['firstname'];?>
        </h5>

        <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_GET['specialty'];?>
        </h6>
        
        <p class="card-text">
            Date of Birth: <?php //echo $_GET['dob']; ?>
        </p>

        <p class="card-text">
            Email: <?php //echo $_GET['email']; ?>
        </p>

        <p class="card-text">
            Phone Number: <?php //echo $_GET['phone']; ?>
        </p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>-->

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST['lastname'] . '<br/>' . $_POST['firstname'];?>
        </h5>

        <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_POST['specialty'];
            echo $specialtyName['name'];
            ?>
        </h6>
        
        <p class="card-text">
            Date of Birth: <?php echo $_POST['dob']; ?>
        </p>

        <p class="card-text">
            Email: <?php echo $_POST['email']; ?>
        </p>

        <p class="card-text">
            Phone Number: <?php echo $_POST['contact']; ?>
        </p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>


<?php require_once 'includes/footer.php'
?>
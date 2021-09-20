<?php
$title = 'View Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
//database connection
require_once 'db/conn.php';

if(!isset($_GET['id'])){
    echo"<h1 class='text-danger'>Please check details and try again!</h1>";
    

}else{
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
?>


<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $result['lastname'] . ' ' . $result['firstname'];?>
        </h5>

        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $result['name'];?>
        </h6>
        
        <p class="card-text">
            Date of Birth: <?php echo $result['dateofbirth']; ?>
        </p>

        <p class="card-text">
            Email: <?php echo $result['emailaddress']; ?>
        </p>

        <p class="card-text">
            Phone Number: <?php echo $result['contactnumber']; ?>
        </p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
            <a href="viewrecords.php" class="btn btn-primary">Back to List</a>
            <a href="edit.php?id=<?php echo $result['attendee_id'];?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete?');" href="delete.php?id=<?php echo $result['attendee_id'];?>" class="btn btn-warning">Delete</a>
<?php }?>

















<?php require_once 'includes/footer.php'
?>
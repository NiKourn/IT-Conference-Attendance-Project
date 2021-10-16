<?php
$title = 'View All Records';
require_once 'header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

//Get all attendees
$results= $crud->getAttendees();
?>
<table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
       
        
    </tr>
</thead>

<tbody>
    <?php
        while ($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
        <td><?php echo $r['attendee_id'];?></td>
        <td><?php echo $r['firstname'];?></td>
        <td><?php echo $r['lastname'];?></td>
        <td><?php echo $r['name'];?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendee_id'];?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendee_id'];?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete?');" href="delete.php?id=<?php echo $r['attendee_id'];?>" class="btn btn-warning">Delete</a>
            
        </td>
    </tr>

    <?php }?>
        
    
</tbody>

</table>
<?php require_once 'footer.php'
?>
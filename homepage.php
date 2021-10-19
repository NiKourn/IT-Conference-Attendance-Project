<?php
$title = 'Detail Entry';
require_once 'header.php';
require_once 'db/conn.php';

$results = $crud->getSpecialties();
?>
    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input required type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input required type="text" class="form-control" id="lastname" name="lastname">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob">
  </div>
  <div class="mb-3">
    <label for="specialty" class="form-label">Specialty/Area of Expertise</label>
    <select class="form-control" id="specialty" name="specialty">
      <?php 
              while ($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?php echo $r['specialty_id'];?>"><?php echo $r['name'];?></option>
     <?php } ?>
    </select>
      </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="contact" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="contact" name="contact" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
  </div>
  <div class="custom-file">
  <label class="custom-file-label" for="avatar">Insert your avatar</label><br>
    <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
    <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
  </div><br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once 'footer.php'
?>
   
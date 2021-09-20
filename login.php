<?php
$title = 'User Login';
require_once 'includes/header.php';
require_once 'db/conn.php';
//If data was submitted via a form POST request, then
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    //Hash Password
    $new_password = md5($password.$username);
    $result = $userlog->getUser($username, $new_password);
    if(!$result){
      echo 'Username or password is not correct. Please try again';
    }else{
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $result['id'];
      header("Location: viewrecords.php");
    }
}
?>
<h1 class="text-center"><?php echo $title; ?></h1>


<!--Reload this page and do the posting action on this page  
htmlentities can strip down the exploitation by hackers -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username: *</label>
    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  
  <button type="submit" class="btn btn-primary" value="login">Login</button>
  <br/>
  <a href="#">Forgot Password?</a>
</form>
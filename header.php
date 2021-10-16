<?php
//This includes the session file. This file contains code that starts/resumes a session
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
 //include_once "$rootDir/session.php";
include_once 'includes/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />
    <title>Attendance - <?php echo $title ?></title>
  </head>
  <body>
      <div class="container">
        <header> 
         <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">IT Conference</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"> <a class="nav-link" href="viewrecords.php">View Records</a></li>
                    <!--<li class="nav-item"> <a class="nav-link" href="admin-pane/main.php">Edit Site</a></li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Link</a>      
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                      </li>-->
                  </div>
                  <div class="navbar-nav ml-auto">
                    <?php if(!isset($_SESSION['userid'])){  ?>
                      <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li><?php } else {?>
                      <li class="nav-item"><a class="nav-link" href="#"><span>Hello <?php echo $_SESSION['username']. ' - ' . $_SESSION['userid'];  ?></span></a></li>
                      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a><?php } ?></li>
                  </div>

                </div>
              </div>
          </nav>
        </header>
    <br/>
    <br/>
    
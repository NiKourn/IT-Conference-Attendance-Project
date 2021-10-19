<h1 class="text-center"><?php echo $title; ?></h1>
      <!--Reload this page and do the posting action on this page  
      htmlentities can strip down the exploitation by hackers -->
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
          <label for="host" class="form-label">Server IP</label>
          <input type="text" name="host" class="form-control" id="host" aria-describedby="" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['host']; ?>">
      </div>  
      <div class="mb-3">
          <label for="host" class="form-label">Server Username:</label>
          <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Server Password</label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
        
        <button type="submit" class="btn btn-primary" value="login">Install App</button>
        <br/>
      </form>
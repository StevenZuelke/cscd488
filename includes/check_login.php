<?php

  if(isset($_POST['loginSubmit'])) {
    // Eventually need to actually authenticate the user first
    $_SESSION['username'] = $_POST['username'];
  }
  
  if (! isset($_SESSION['username'])) {
?>
      <div id="loginform">
        <form method="POST">
          <input type="text" name="username" placeholder="Username"/><br>
          <input type="password" name="password" placeholder="Password"/><br>
          <button type="submit" name="loginSubmit">Login</button>
        </form>
      </div>
<?php
    exit();
  }
  
?>
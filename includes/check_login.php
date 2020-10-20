<?php
  
  require "../classes/User.php";

  if(isset($_POST['loginSubmit'])) {
    // Eventually need to actually authenticate the user first
    $user = new User();
    if($user->validateUser($_POST['username'], $_POST['password'])){
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['user'] = $user;
    }else{
      echo "WRONG INFO";
    }
    
  }
  if(isset($_POST['signupSubmit'])) {
    $user = new User();
    if($user->createUser($_POST['username'], $_POST['password'])){
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['user'] = $user;
    }
    
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
      <div id="signupform">
        <form method="POST">
          <input type="text" name="username" placeholder="Username"/><br>
          <input type="password" name="password" placeholder="Password"/><br>
          <button type="submit" name="signupSubmit">Sign Up</button>
        </form>
      </div>
<?php
    exit();
  }
  
?>
<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Finding a Middle Ground</title>
  </head>
  <body>

    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                

            </ul>
            <div>
            <?php if ($_SESSION['username']) { ?>
            Hello, <b><?php print($_SESSION['username']); ?>
            <form action="includes/logout.inc.php" method="GET">
                <button type="submit" name="logout">Logout</button>
            </form>
            
            <?php } else { ?>
            <form action="includes/login.inc.php" method="POST">
                <input type="text" name="username" placeholder="Username"/><br>
                <input type="password" name="password" placeholder="Password"/><br>
                <button type="submit" name="loginSubmit">Login</button>
            </form>
            <?php } ?>
            </div>

            
        </nav>
    </header>

  </body>
</html>

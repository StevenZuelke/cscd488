<!DOCTYPE html>
<html>
  <head>
    <title>Forms Example</title>
  </head>
  <body>
    <?php if ($_GET['myname']) { ?>
      Hello, <b><?php print($_GET['myname']); ?>
    <?php } else { ?>
      <form method="GET">
        <label for="username">What is your name?</label>
        <input type="text" name="myname" />
        <br>
        <input type="submit">
      </form>
    <?php } ?>
  </body>
</html>

<?php
 
require_once ('functions.php');
 
// Check to see if we're already logged in or if we have a special status div to report
$loginDiv = checkLoggedIn (Page::LOGIN);
 
?>
 
<html>
   <body>
      <h2>Sign in</h2>
      <form name="login" method="post" action="login.php">
         <input type="hidden" name="action" value="login" />
         <label for="login-username">Username:</label><br />
         <input id="login-username" name="login-username" type="text" /><br />
         <label for="password">Password:</label><br />
         <input name="password" type="password" /><br />
         <input id="remember" name="remember" type="checkbox" />
         <label for="remember">Remember me</label><br />
         <?php echo $loginDiv ?>
         <input type="submit" value="Login" />
      </form>
   </body>
</html>
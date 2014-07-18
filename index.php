<?php
 
require_once ('functions.php');
 
checkLoggedIn (Page::INDEX);
 
?>
 
<html>
   <body>
      <form name="logout" method="post" action="login.php">
         <input type="hidden" name="action" value="logout" />
         <input type="submit" value="Logout" />
      </form>
   </body>
</html>
<?php
 
require_once ('class-databasehelpers.php');
require_once ('class-userdata.php');
 
class Users
{
   public function checkCredentials($username, $password)
   {
      // A UserID of 0 from the database indicates that the username/password pair
      // could not be found in the database
      $userID = 0;
      $digest = '';
 
      try
      {
         $dbh = DatabaseHelpers::getDatabaseConnection();
 
         // Build a prepared statement that looks for a row containing the given
         // username/password pair
         $stmt = $dbh->prepare('SELECT UserID, Password FROM Users WHERE ' .
                               'Username=:username ' .
                               'LIMIT 1');
 
         $stmt->bindParam(':username', $username, PDO::PARAM_STR);
 
         $success = $stmt->execute();
 
         // If results were returned from executing the MySQL command, we
         // have found the user
         if ($success)
         {
            // Ensure provided password matches stored hash
            $userData = $stmt->fetch();
            $digest = $userData['Password'];
            if (crypt ($password, $digest) == $digest)
            {
               $userID = $userData['UserID'];
            }
         }
 
         $dbh = null;
      }
      catch (PDOException $e)
      {
         $userID = 0;
         $digest = '';
      }
 
      return array ($userID, $username, $digest);
   }
}
 
?>
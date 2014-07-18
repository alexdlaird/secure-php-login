<?php
 
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'project_name');
define ('DB_USERNAME', 'sql-username');
define ('DB_PASSWORD', 'sql-password');
 
class DatabaseHelpers
{
   function blowfishCrypt($password, $length)
   {
      $chars = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      $salt = sprintf ('$2a$%02d$', $length);
      for ($i=0; $i < 22; $i++)
      {
         $salt .= $chars[rand (0,63)];
      }
 
      return crypt ($password, $salt);
   }
 
   public function getDatabaseConnection()
   {
      $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
 
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
      return $dbh;
   }
}
 
?>
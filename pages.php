<?php
 
// To get around the fact that PHP won't allow you to declare
// a const with an expression, define our constants outside
// the Page class, then use these variables within the class
define ('LOGIN', 'Login');
define ('INDEX', 'Index');
 
class Page
{
   const LOGIN = LOGIN;
   const INDEX = INDEX;
}
 
?>
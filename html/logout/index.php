<?php
  unset($_COOKIE['authanticate']); 
  setcookie('authanticate', null, -1, '/');
  unset($_COOKIE['user']);
  setcookie('user', null, -1, '/');
  header("location: /");
?> 

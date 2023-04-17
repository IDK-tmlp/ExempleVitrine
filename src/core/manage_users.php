<?php

 /**
  * Teste si l'utilisateur est bien identifié via users.csv
  * @return boolean
  */
function isLoggedIn($users, $passwd, $mail){
  foreach ($users as $user) {
    if(password_verify($passwd, trim($user[3])) && trim($user[2]) === trim($mail)) return true;
  }
  return false;
}

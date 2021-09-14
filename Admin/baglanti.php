<?php

try {
  $baglanti=new PDO('mysql:host=localhost; dbname=phpblog; 
  charset=utf8', 'root', '');

}catch (Exception $e) {
   echo "Hata yaptın:". $e->getMessage();

}








?>
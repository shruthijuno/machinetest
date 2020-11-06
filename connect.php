<?php


   // $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


   Class DbConnection{
       function getdbconnect(){
          
         define('DB_SERVER', 'localhost');
         define('DB_USERNAME', 'root');
         define('DB_PASSWORD', '');
         define('DB_DATABASE', 'file_management');
         $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Couldn't connect");
           return $conn;
       }
   }


   ?>




















?>
<?php 

// Database configuration for localhost
// $dbHost     = "localhost";  
// $dbUsername = "root"; 
// $dbPassword = ""; 
// $dbName     = "uerygfmm_Dashboard"; 

// Database configuration for webhostmost
$dbHost     = "localhost";  
$dbUsername = "uerygfmm_Dashboard"; 
$dbPassword = "afWKXTPVzWBTDw2FzLGh"; 
$dbName     = "uerygfmm_Dashboard"; 

// Create database connection 
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection 

// if ($conn) {
//     echo '<script>alert("Connection Success!")</script>';
// } else {
//     echo '<script>alert("Connection Failed!")</script>';
// }
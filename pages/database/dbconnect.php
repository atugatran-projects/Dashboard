<?php 

// Database configuration for localhost
$dbHost     = "localhost";  
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "atul22g_dashboard"; 

// Connect to the Database  for alwaysdata
// $dbHost = "mysql-atul22g.alwaysdata.net";
// $dbUsername = "atul22g";
// $dbPassword = "RInnXFrPkhLqPJ8xbT6515Pk6BzKJPqCNjPnhcxV17dtwSLh9t";
// $dbName = "atul22g_dashboard";

// Create database connection 
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection 

if ($conn) {
    echo '<script>alert("Connection Success!")</script>';
} else {
    echo '<script>alert("Connection Failed!")</script>';
}
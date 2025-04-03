<?php

// Connect to the database using MySQLi with the specified host, username, password, and database name
$conn = mysqli_connect('localhost', 'admin', 'test1234', 'pizza_shop');

// Check if the database connection was successful
if (!$conn) {
  // Output an error message if the connection failed
  echo 'Connection error: ' . mysqli_connect_error();
}
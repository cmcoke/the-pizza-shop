<?php

// Output the contents of 'readme.txt' to the browser and return the number of bytes read
// echo readfile('readme.txt');

// Assign the filename 'readme.txt' to the variable $file
$file = 'readme.txt';

// Check if the file specified in $file exists
if (file_exists($file)) {

  // Output the file contents and the number of bytes read, followed by a line break
  // echo readfile($file) . '<br/>';

  // Make a copy of the file and name the new file 'lorem.txt'
  // copy($file, 'lorem.txt');

  // Output the absolute (full system) path of the file, followed by a line break
  // echo realpath($file) . '<br/>';

  // Output the size of the file in bytes, followed by a line break
  // echo filesize($file) . '<br/>';

  // Rename the file from 'readme.txt' to 'quotes.txt'
  // rename($file, 'quotes.txt');
} else {
  // Display an error message if the file does not exist
  echo 'File does not exist';
}

// Create a new directory called 'new'
// mkdir('new');
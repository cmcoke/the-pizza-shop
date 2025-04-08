<?php

/**
 * fopen()
 * 
 *  -  is a built-in function used to open a file or URL. 
 * 
 *  - It returns a file handle (a special resource that represents the connection to the file), which you can then use with other file functions like fread(), fwrite(), fclose(), etc.
 * 
 *  Syntax:
 * 
 *  fopen(filename, mode)
 * 
 *   - filename: The name of the file (or URL) you want to open.
 *  
 *   - mode: A string that specifies the type of access you require (read, write, append, etc.).
 * 
 *  Common Modes:
 * 
 *  Mode	Description
 *  'r' 	Open for reading only. File must exist.
 *  'r+ '	Open for reading and writing. File must exist.
 *  'w' 	Open for writing only. Erases file contents or creates new file.
 *  'w+' 	Open for reading and writing. Erases contents or creates new file.
 *  'a' 	Open for appending. Creates file if it doesn't exist.
 *  'a+' 	Open for reading and appending.
 *  'x' 	Create new file for writing. Fails if file already exists.
 *  'x+' 	Create new file for reading and writing. Fails if file exists.
 * 
 *  More information -- https://www.w3schools.com/php/func_filesystem_fopen.asp
 */

// Define the file name to be opened
$file = 'quotes.txt';

// Open the file for reading ('r' mode), and store the file handle in the variable $handle
$handle = fopen($file, 'r');

// Read the entire contents of the file based on its size and output it to the browser
echo fread($handle, filesize($file));

// Attempt to read 112 bytes from the current position in the file (will return empty if already at end of file)
// echo fread($handle, 112);

// Attempt to read a single line from the file (also likely to return nothing if already at the end of file)
// echo fgets($handle);

// Attempt to read a single character from the file
// echo fgetc($handle);


// Open the file for reading and writing ('r+' mode). The file must exist.
// $handle = fopen($file, 'r+');

// Reassign $handle to open the file for reading and appending ('a+' mode). If the file does not exist, it will be created.
// Note: This line replaces the previous $handle value from 'r+' mode.
// $handle = fopen($file, 'a+');

// Write a new line with the string "Everything popular is wrong." to the end of the file
// fwrite($handle, "\nEverything popular is wrong.");

// Close the file handle to free up system resources
// fclose($file);

// Delete the file from the file system
// unlink($file);
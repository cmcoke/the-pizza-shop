<?php

/**
 *  Ternary operators
 * 
 *   - A concise way of writing if statements
 */

// $score = 50;
// echo $score > 30 ?  'high score' : 'low score';


/**
 * Superglobals
 * 
 *  - Superglobals are built-in array variables in PHP that are available in all scopes throughout a script—meaning they can be accessed from any function, class, or file without needing to be declared as global. 
 * 
 *  - They are mainly used to handle data from user input, server information, sessions, and cookies.
 * 
 */

// $_GET[] - Used to collect data sent via the URL query string (e.g., example.com/page.php?name=John).

// if (isset($_GET['submit'])) {
//   echo $_GET['name'];
// }


// $_POST[] - Used to collect form data sent via the POST method.

// if (isset($_POST['submit'])) {
//   echo $_POST['name'];
// }


// $_SERVER[] - Contains information about the server environment, the current request, headers, and paths.

// echo $_SERVER['SERVER_NAME'] . '<br />';
// echo $_SERVER['REQUEST_METHOD'] . '<br />';
// echo $_SERVER['SCRIPT_FILENAME'] . '<br />';
// echo $_SERVER['PHP_SELF'] . '<br />';


// $_SESSION[] - Used to store data that should be preserved across multiple pages or requests during a user's visit (session).


// Check if the form has been submitted by looking for the 'submit' key in the POST data
// if (isset($_POST['submit'])) {

//   // Start a new session or resume the existing one
//   // session_start();

//   // Store the submitted name into a session variable called 'name'
//   // $_SESSION['name'] = $_POST['name'];
//   // echo 'Hello ' . $_SESSION['name'];

//   // Redirect the user to the index.php page after setting the session variable
//   // header('Location: index.php');
// }


// $_COOKIE[] - Used to access values stored in the user's browser cookies.

// Check if the form has been submitted using the POST method
if (isset($_POST['submit'])) {

  // Start a new session or resume the existing one
  session_start();

  // Store the submitted 'name' value in the session under the key 'name'
  $_SESSION['name'] = $_POST['name'];

  // Create a cookie named 'gender' with the submitted value from the form
  // The cookie will expire in 86400 seconds (i.e., 1 day)
  setcookie('gender', $_POST['gender'], time() + 86400);

  // Redirect the user to the index.php page after setting session and cookie
  header('Location: index.php');
}


/**
 * Null Coalescing Operator (??)
 * 
 *  -  is a logical operator that checks if the first value is not set or is NULL, and if so, returns the second value. Otherwise, it returns the first.
 */

//  $name = $_SESSION['name'] ?? 'Guest';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Sandbox</title>
</head>

<body>


  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="name">
    <select name="gender">
      <option value="male">male</option>
      <option value="female">female</option>
    </select>
    <input type="submit" name="submit" value="submit">
  </form>


</body>

</html>
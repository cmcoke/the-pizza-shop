<?php

// Start a new session or resume the existing one
session_start();

// over write the value from  $_SESSION['name']
// $_SESSION['name'] = 'Jane';

// Check if the query string in the URL is equal to 'noname'
if ($_SERVER['QUERY_STRING'] == 'noname') {

  // Remove the 'name' session variable from the current session
  unset($_SESSION['name']);

  // Unset all session variables (clears the session data)
  // session_unset();
}

// Assign the value of the 'name' session variable to $name if it exists otherwise, assign the default value 'Guest' using the null coalescing operator (??)
$name = $_SESSION['name'] ?? 'Guest';

// Check if a cookie named 'gender' exists and assign its value to the $gender variable. If the cookie doesn't exist, default the value of $gender to 'Unknown'
$gender = $_COOKIE['gender'] ?? 'Unknown';

?>


<head>
  <title>Ninja Pizza</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
    .brand {
      background: #cbb09c !important;
    }

    .brand-text {
      color: #cbb09c !important;
    }

    form {
      max-width: 460px;
      margin: 20px auto;
      padding: 20px;
    }

    .pizza {
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }

    .edit_and_delete {
      display: flex;
      align-items: center;
      margin: 0 auto;
      max-width: 150px;
    }
  </style>
</head>

<body class="grey lighten-4">
  <nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">The Pizza Shop</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <!-- Display a list item with a personalized greeting using the value stored in $name.  The htmlspecialchars() function is used to escape special characters and prevent XSS attacks -->
        <li class="grey-text">Hello <?= htmlspecialchars($name);  ?></li>
        <!-- Display the user's gender (retrieved from the cookie or defaulted to 'Unknown') in a list item with grey text. The htmlspecialchars() function is used to escape special characters and prevent XSS attacks -->
        <li class="grey-text">(<?= htmlspecialchars($gender); ?>)</li>
        <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
      </ul>
    </div>
  </nav>
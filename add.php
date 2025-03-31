<?php

// Initialize variables to store form input values as empty strings
$email = $title = $ingredients = '';

// Initialize an associative array to store error messages for each field
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

// Check if the form has been submitted using the POST method
if (isset($_POST['submit'])) {

  // Check if the 'email' field is empty
  if (empty($_POST['email'])) {
    // Store an error message if no email is provided
    $errors['email'] = 'An email is required';
  } else {
    // Sanitize and store the submitted email value
    $email = $_POST['email'];

    // Validate the email format using FILTER_VALIDATE_EMAIL
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // Store an error message if the email format is invalid
      $errors['email'] = 'Email must be a valid email address';
    }
  }

  // Check if the 'title' field is empty
  if (empty($_POST['title'])) {
    // Store an error message if no title is provided
    $errors['title'] = 'A title is required';
  } else {
    // Sanitize and store the submitted title value
    $title = $_POST['title'];

    // Validate the title to allow only letters and spaces
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      // Store an error message if the title contains invalid characters
      $errors['title'] = 'Title must be letters and spaces only';
    }
  }

  // Check if the 'ingredients' field is empty
  if (empty($_POST['ingredients'])) {
    // Store an error message if no ingredients are provided
    $errors['ingredients'] = 'At least one ingredient is required';
  } else {
    // Sanitize and store the submitted ingredients value
    $ingredients = $_POST['ingredients'];

    // Validate the ingredients format to ensure it is a comma-separated list of words
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      // Store an error message if the format is not a comma-separated list
      $errors['ingredients'] = 'Ingredients must be a comma separated list';
    }
  }
} // end POST check

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<section class="container grey-text">
  <h4 class="center">Add a Pizza</h4>
  <form class="white" action="add.php" method="POST">
    <label>Your Email</label>
    <!-- Display the sanitized email value inside the input field -->
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <!-- Display the error message of the email -->
    <div class="red-text"><?php echo $errors['email']; ?></div>
    <label>Pizza Title</label>
    <!-- Display the sanitized title value inside the input field -->
    <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
    <!-- Display the error message of the title -->
    <div class="red-text"><?php echo $errors['title']; ?></div>
    <label>Ingredients (comma separated)</label>
    <!-- Display the sanitized ingredients value inside the input field -->
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    <!-- Display the error message of the ingredients -->
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>
    <div class="center">
      <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php include('templates/footer.php'); ?>

</html>
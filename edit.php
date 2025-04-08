<?php

// Include the database connection file
include('config/db_connection.php');

/**
 * Get the values (email, title, ingredients) based on the 'id' of the item.
 */

// Sanitize the 'id' received from the GET request to prevent SQL injection
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Build SQL query to fetch the pizza record with the given id
$sql = "SELECT * FROM pizzas WHERE id = $id";

// Execute the SQL query and store the result
$result = mysqli_query($conn, $sql);

// Fetch the result as an associative array (one row)
$pizza = mysqli_fetch_assoc($result);

// Free the memory associated with the result
mysqli_free_result($result);


/**
 * Update the values (email, title, ingredients) based on the 'id' of the item.
 */

// Initialize an array to hold validation errors
$errors = ['email' => '', 'title' => '', 'ingredients' => ''];

// Check if the form has been submitted
if (isset($_POST['submit'])) {

  // Validate email field
  if (empty($_POST['email'])) {
    $errors['email'] = 'An email address must be provided';
  } else {
    $email = $_POST['email'];
    // Check if the email is in a valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Please enter a valid email address';
    }
  }

  // Validate title field
  if (empty($_POST['title'])) {
    $errors['title'] = 'A title for the item must be provided';
  } else {
    $title = $_POST['title'];
    // Check if the title contains only letters and spaces
    if (!preg_match('/^[A-Za-z ]+$/', $title)) {
      $errors['title'] = 'A title must only contain letters and spaces';
    }
  }

  // Validate ingredients field
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = 'Enter at least one ingredient';
  } else {
    $ingredients = $_POST['ingredients'];
    // Check if ingredients are a comma-separated list of letters and spaces
    if (!preg_match('/^([A-Za-z ]+)(,\s*[A-Za-z ]+)*$/', $ingredients)) {
      $errors['ingredients'] = 'Ingredients must be a comma separated list';
    }
  }

  // If no validation errors exist
  if (!array_filter($errors)) {

    // Sanitize all user inputs to escape special characters
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

    // Create SQL query to update the pizza record
    $sql = "UPDATE pizzas SET email = '$email', title = '$title', ingredients = '$ingredients' WHERE id = $id";

    // Execute the update query
    if (mysqli_query($conn, $sql)) {
      // Redirect to the details page after successful update
      header("Location: details.php?id=$id");
      exit(); // Make sure to exit after redirect
    } else {
      // Output error message if update fails
      echo 'Update failed: ' . mysqli_error($conn);
    }
  }
}

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html>

<!-- Include the header template file -->
<?php include('templates/header.php'); ?>

<?php if ($pizza) : ?>
<!-- If the pizza exists, show the edit form -->

<section class="container grey-text">
  <h4 class="center">Edit Pizza</h4>

  <!-- Form for updating pizza information -->
  <form class="white" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $pizza['id'] ?>" method="POST">

    <label>Your Email</label>
    <!-- Pre-fill the email input with submitted value or existing pizza email -->
    <input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? $pizza['email']); ?>">
    <!-- Display email validation error -->
    <div class="red-text"><?php echo $errors['email']; ?></div>

    <label>Pizza Title</label>
    <!-- Pre-fill the title input with submitted value or existing pizza title -->
    <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? $pizza['title']); ?>">
    <!-- Display title validation error -->
    <div class="red-text"><?php echo $errors['title']; ?></div>

    <label>Ingredients (comma separated)</label>
    <!-- Pre-fill the ingredients input with submitted value or existing pizza ingredients -->
    <input type="text" name="ingredients"
      value="<?= htmlspecialchars($_POST['ingredients'] ?? $pizza['ingredients']); ?>">
    <!-- Display ingredients validation error -->
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>

    <div class="center">
      <!-- Submit button -->
      <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php else : ?>
<!-- If no pizza found, show a message -->
<h4 class="center">Pizza Does Not Exist</h4>
<?php endif; ?>

<!-- Include the footer template file -->
<?php include('templates/footer.php'); ?>

</html>
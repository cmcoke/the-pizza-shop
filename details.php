<?php

// Include the database connection file to establish a connection with the database
include('config/db_connection.php');

// Check if the delete form has been submitted
if (isset($_POST['delete'])) {

  // Get the pizza ID to delete from the form, sanitizing it to prevent SQL injection
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

  // Prepare an SQL query to delete the pizza from the database where the ID matches
  $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

  // Execute the SQL query and check if the deletion was successful
  if (mysqli_query($conn, $sql)) {
    // Redirect to the index page upon successful deletion
    header('Location: index.php');
  } else {
    // Display an error message if the query execution fails
    echo 'query error: ' . mysqli_error($conn);
  }
}

// Check if an ID parameter is passed through the URL (using GET method)
if (isset($_GET['id'])) {

  // Sanitize the ID from the URL to prevent SQL injection
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // Prepare an SQL query to fetch the pizza details with the given ID
  $sql = "SELECT * FROM pizzas WHERE id = $id";

  // Execute the SQL query and store the result
  $results = mysqli_query($conn, $sql);

  // Fetch the pizza details as an associative array
  $pizza = mysqli_fetch_assoc($results);

  // Free up the result set to save memory
  mysqli_free_result($results);

  // Close the database connection
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<!-- Include the header template file -->
<?php include('templates/header.php'); ?>

<div class="container center grey-text">

  <!-- Check if the pizza details were retrieved successfully -->
  <?php if ($pizza) : ?>
    <!-- Display the pizza title -->
    <h4><?= htmlspecialchars($pizza['title']); ?></h4>

    <!-- Display the creator's email -->
    <p>Created by <?= htmlspecialchars($pizza['email']); ?></p>

    <!-- Display the date when the pizza was created -->
    <p><?= date($pizza['created_at']); ?></p>

    <!-- Display the ingredients list -->
    <h5>Ingredients:</h5>
    <p><?= htmlspecialchars($pizza['ingredients']); ?></p>

    <div class="edit_and_delete">

      <!-- Edit -->
      <a href="edit.php?id=<?= $pizza['id']; ?>" class="btn brand z-depth-0">Edit</a>

      <!-- Delete Form -->
      <form action="details.php" method="POST">
        <!-- Hidden input field to pass the pizza ID to delete -->
        <input type="hidden" name="id_to_delete" value="<?= $pizza['id']; ?>">

        <!-- Submit button to trigger the deletion -->
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
      </form>

    </div>

  <?php else : ?>
    <!-- Display a message if the pizza was not found -->
    <h5>No such pizza exists.</h5>
  <?php endif; ?>

</div>

<!-- Include the footer template file -->
<?php include('templates/footer.php'); ?>

</html>
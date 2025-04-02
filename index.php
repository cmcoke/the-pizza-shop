<?php

// Connect to the database using MySQLi with the specified host, username, password, and database name
$conn = mysqli_connect('localhost', 'admin', 'test1234', 'pizza_shop');

// Check if the database connection was successful
if (!$conn) {
  // Output an error message if the connection failed
  echo 'Connection error: ' . mysqli_connect_error();
}

// Write an SQL query to retrieve the title, ingredients, and ID from the 'pizzas' table and order it by the 'created_at' column
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// Execute the SQL query and store the results
$results = mysqli_query($conn, $sql);

// Fetch the resulting rows as an associative array
$pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);

// Free up the memory associated with the result set
mysqli_free_result($results);

// Close the database connection
mysqli_close($conn);

// Output the data from the $pizzas array to the screen for debugging
// print_r($pizzas);

?>


<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
  <div class="row">

    <?php foreach ($pizzas as $pizza) : ?>

    <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <h6><?= htmlspecialchars($pizza['title']); ?></h6>
          <div>
            <?= htmlspecialchars($pizza['ingredients']); ?>
          </div>
        </div>
        <div class="card-action right-align">
          <a href="#" class="brand-text">more info</a>
        </div>
      </div>
    </div>

    <?php endforeach ?>

  </div>
</div>

<?php include('templates/footer.php'); ?>

</html>
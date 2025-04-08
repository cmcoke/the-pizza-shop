<?php

// Include the database connection file to establish a connection with the database
include('config/db_connection.php');

// Write an SQL query to retrieve the title, ingredients, and ID from the 'pizzas' table and order it by the 'created_at' column
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// Execute the SQL query and store the results in the $results variable
$results = mysqli_query($conn, $sql);

// Fetch all rows from the result set as an associative array
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

<!-- Include the header template file -->
<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
  <div class="row">

    <!-- Loop through each pizza in the $pizzas array and display it -->
    <?php foreach ($pizzas as $pizza) : ?>

      <!-- Create a column for each pizza card -->
      <div class="col s6 md3">
        <div class="card z-depth-0">
          <img src="img/pizza.svg" class="pizza">
          <div class="card-content center">
            <!-- Display the pizza title, escaping any HTML characters -->
            <h6><?= htmlspecialchars($pizza['title']); ?></h6>
            <ul>
              <!-- Loop through each ingredient in the pizza and display it as a list item -->
              <?php foreach (explode(',', $pizza['ingredients']) as $ingredent) : ?>
                <li><?= htmlspecialchars($ingredent); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="card-action right-align">
            <!-- Link to the details page for the specific pizza, passing the pizza ID as a query parameter -->
            <a href="details.php?id=<?= $pizza['id']; ?>" class="brand-text">more info</a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

  </div>
</div>

<!-- Include the footer template file -->
<?php include('templates/footer.php'); ?>

</html>
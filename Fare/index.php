<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOk OOP</title>
</head>
<body>
  <form action="" method="post">
    <label for="title">age</label>
    <input type="number" name="age" id="age" min="10" max="80" required>

    <br>

    <label for="number">distance(km)</label>
    <input type="number" name="distance" id="distance">

    <br>

    <button type="submit" name="btn_submit">submit</button>
  </form>

  <?php
      if (isset($_POST['btn_submit'])) {
        $age = $_POST["age"];
        $distance = $_POST["distance"];

        include 'Fare.php';
        $fareCalculator = new FareCalculator();

        $fare = $fareCalculator->calculateFare($age, $distance);

        echo "Age: $age years<br>";
        echo "Distance Traveled: $distance km<br>";
        echo "Total Fare: $" . number_format($fare, 2) . "<br>";
    }
    ?>

  </body>
</html>
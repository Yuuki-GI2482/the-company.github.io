<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOk OOP</title>
</head>
<body>
  <form action="" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title">

    <br>

    <label for="price">Price</label>
    <input type="number" name="price" id="price">

    <br>

    <button type="submit" name="btn_submit">submit</button>
  </form>
   <!-- collect data from the form -->
    <?php
      if(isset($_POST['btn_submit'])){
        // assign a variable for the values
        $title = $_POST['title'];
        $price = $_POST['price'];

        // create an instance of the Book class
        include 'Book.php';
        $book = new Book($title,$price);

        // SET THE VALUES using the setter
        // $book->setTitle($title);
        // $book->setPrice($price);

        //DISPLAY THE VALUES using the getters

        echo "Title: " . $book->getTitle()  . "<br>";
        echo "Price: " . $book->getPrice()  . "<br>";

      }
    ?>
  
</body>
</html>
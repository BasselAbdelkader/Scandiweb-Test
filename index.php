<?php

include "classes/Db.php";
include "classes/Product.php";
include "classes/Book.php";
include "classes/Disk.php";
include "classes/Furniture.php";
include "classes/herokuConnect.php";


// connecting to the Heroku Servers using ClearDB add-on
list($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db) = herokuConnect();
$connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

//initalising Classes
$product = new Product($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
$disk = new Disk($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
$book = new Book($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
$furniture = new Furniture($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


// a simple Mass Delete implementation

if (isset($_POST['but_delete'])) {

    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $deleteid) {

            $deleteUser = "DELETE from items WHERE id=" . $deleteid;
            mysqli_query($connection, $deleteUser);
        }
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <title>scandiweb</title>
</head>
<body>
<header>
<span><h1>Products List</h1>


<button class="btn btn-info btn-lg" id="add-button" onclick="window.location.href='/addproduct.php';"
        role="button">ADD</button>

</span>

</header>


<div class="container-fluid">
    <form method="post" action="" class="checkbox-form">
        <div id="checkdiv">
  <span id="checkall">
    <br>
    Select All  <input type="checkbox" name="checkAll" id="checkAll">
</span>
        </div>


        <div class="row">

            <?php

            // passing the IDs of all products in the database to the get allAttributes function and then displaying them in a responsive (for tablets and computers) Bootstrap grid

            $query = "SELECT * FROM items";
            $select_all_items_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_items_query)) {
                if (count($row) > 0) {
                    $product_attributes = $product->getAllAttributes($row['id']);
                    $disk_attributes = $disk->getAllAttributes($row['id']);
                    $book_attributes = $book->getAllAttributes($row['id']);
                    $furniture_attributes = $furniture->getAllAttributes($row['id']);

                }

                ?>
                <div class="col-lg-2 col-md-3  col-sm-6">

                    <div class="card">


                        <div class="card-body">


                            <label>
                                <input type='checkbox' class="delete-checkbox" name='delete[]'
                                       value='<?= $row['id'] ?>'>
                            </label>

                            <p class="card-text"> <?= $product->getSKU() ?></p>
                            <p class="card-text"> <?= $product->getProductName() ?></p>
                            <p class="card-text"> <?= $product->getPrice() . " $" ?></p>
                            <p class="card-text"> <?php if ($row['Size']) {

                                    echo "Size: " . $disk->getAttribute('Size') . " MB";
                                } else {


                                } ?></p>
                            <p class="card-text"><?php if ($row['Weight']) {
                                    echo("Weight: " . $book->getAttribute('Weight') . "KG");
                                } else {
                                } ?></p>
                            <p class="card-text"> <?php if ($row['Dimensions']) {
                                echo("Dimensions: " . $furniture->getAttribute('Dimensions'));
                            } else {

                            } ?><p class="card-text"></p>

                        </div>
                    </div>

                </div>
            <?php } ?>


        </div>
        <input type='submit' value=' MASS DELETE' class="btn btn-danger delete-button btn-lg" id="delete-product-btn"
               name='but_delete'></form>


</div>

<footer>
    <hr>
    <p>Scandiweb Test Assignment</p>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/javascript/index.js"></script>

</body>

</html>




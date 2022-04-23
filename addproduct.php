<?php
include 'classes/Db.php';
include "classes/herokuConnect.php";

// connecting to the Heroku Servers using ClearDB add-on
list($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db) = herokuConnect();
$connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


if (isset($_POST['save'])) {
    $SKU = test_input($_POST['sku']);
    $Name = test_input($_POST['name']);
    $Price = test_input($_POST['price']);
    $Weight = test_input($_POST['weight']);
    $Size = test_input($_POST['size']);
    $Height = test_input($_POST['height']);
    $Width = test_input($_POST['width']);
    $Length = test_input($_POST['length']);
    $Dimensions = test_input($Height . "x" . $Width . "x" . $Length);

    // this if loop handles the case of a user trying to submit a product without choosing a type
    if ($Weight == null && $Size == null && $Dimensions == 'xx') {

        echo '<script>alert("please choose a type")</script>';

    // this if loop handles the case of a user trying to submit a non numeric value for the price input field
    } elseif (is_numeric($Price)) {

        $query = "INSERT INTO items(SKU,Name,Price,Weight,Size,Dimensions)
  VALUES('$SKU','$Name','$Price',(NULLIF('$Weight','')),(NULLIF('$Size','')),(NULLIF('$Dimensions','xx')))";

        $insert_all_items_query = mysqli_query($connection, $query);
        header("location: /index.php", true, 303);
        exit;
    } else {
        echo "<script>alert('Please enter a numeric value for the Price input field!')</script>";


    }


}


?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">


<span>
  <header>
    <h1>Product Add</h1>
    <button name="cancel" onclick="window.location.href='/index.php';" id="cancel" value="cancel"
            class="btn cancel btn-danger btn-lg ">Cancel</button>
  </header>
</span>


<form method="POST" id="product_form">


    <div class="mb-3">
        <label for="SKU" name="SKU" class="form-label">SKU</label>
        <input type="text" name="sku" class="form-control" id="sku"
               placeholder="Strictly alphanumeric and dashes (8-10 digits)" required>
    </div>
    <div class="mb-3">
        <label for="name" name="Name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Insert any alphanumeric characters"
               required>
    </div>
    <div class="mb-3">
        <label for="Price" name="price" class="form-label">Price ($)</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Insert any non-negative number"
               required>
    </div>
    <div>
        <select id="productType">
            <option value="choose">Type Switcher</option>
            <option value="book" id="Book">Book</option>
            <option value="DVD" id="DVD">DVD</option>
            <option value="furniture" id="Furniture">Furniture</option>
        </select>
    </div>


    <div class="mb-3 book box">
        <label for="Weight" class="form-label">Weight (KG)</label>
        <input type="text" name="weight" id="weight" class="form-control"><br>
        Please, provide Weight
    </div>
    <div class="mb-3 DVD box">
        <label for="Size" class="form-label">Size (MB)</label>
        <input type="text" name="size" id="size" class="form-control"> <br>
        Please, provide Size
    </div>
    <div class="mb-3 furniture box">
        <label for="Height" class="form-label">Height (CM)</label>
        <input type="text" name="height" id="height" class="form-control">
    </div>
    <div class="mb-3 furniture box">
        <label for="Width" class="form-label">Width (CM)</label>
        <input type="text" name="width" id="width" class="form-control">
    </div>
    <div class="mb-3 furniture box">
        <label for="Length" cl ass="form-label">Length (CM)</label>
        <input type="text" name="length" id="length" class="form-control"> <br>
        Please, provide Dimensions
    </div>
    <br>


    <button class="btn btn-info btn-lg save" type="submit" role="button" value="save" id="save" name="save">Save
    </button>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="javascript/index.js"></script>


<footer id="add-product-footer">
    <hr>
    <p>Scandiweb Test Assignment</p>
</footer>


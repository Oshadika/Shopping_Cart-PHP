<?php
session_start();
include "connection.php";
$db = dbConn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {

        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);
            print_r($_SESSION['cart']);
        } else {
            $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);
            // print_r($_SESSION['cart']);
        }
    }
}
?>
<?php
include "header.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            $sql = "SELECT * FROM items";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {

                foreach ($result as $data) {

            ?>
                    <div class="col-lg-3 mb-5">
                        <form action=" " method="post">
                            <div class="card" style="min-height: 400px;">
                                <img src="images/<?= $data['image'] ?>" alt="" srcset="" height="200px">

                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['item_name'] ?></h5>

                                    <p class="card-text"><small class="text-muted"><?= $data['price'] ?></small></p>
                                    <button class="btn btn-info" type="submit" name="add_to_cart">Add To Cart</button>
                                    <input type="text" name="item_name" value="<?= $data['item_name'] ?>">
                                    <input type="text" name="price" value="<?= $data['price'] ?>">
                                </div>
                            </div>
                        </form>

                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
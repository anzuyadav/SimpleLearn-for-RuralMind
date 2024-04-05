<?php 
include 'settingEsewa.php';
// include('./database.php');
// session_start();
//     if(!isset($_SESSION['stuLogEmail'])) {
//     echo "<script> location.href='logorSign.php'; </script>";
//     } else {
//     $stuEmail = $_SESSION['stuLogEmail'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Checkout</title>
</head>
<body>


<div class ="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3 jumbotron">
    <h3 class="mb-5">Welcome to SimpleLearn Payment Page</h3>
    <form action="<?php echo $epay_url ?>" method="POST">
    <input type="text" id="amount" name="amount" value="100" required>
    <input type="text" id="tax_amount" name="tax_amount" value ="10" required>
    <input type="text" id="total_amount" name="total_amount" value="110" required>
    <input type="text" id="transaction_uuid" name="transaction_uuid"required>
    <input type="text" id="product_code" name="product_code" value ="<?php echo $orderID ?>" required>
    <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
    <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
    <input type="text" id="success_url" name="success_url" value="<?php echo $successurl?>" required>
    <input type="text" id="failure_url" name="failure_url" value="<?php echo $failedurl?>" required>
    <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
    <input type="text" id="signature" name="signature" required>
    <input value="Submit" type="submit">
    </form> 
    </div> 
    </div> 
</div>  


<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

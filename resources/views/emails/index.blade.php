<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Email Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<h3>Your order information:</h3>

        <p>Price: {{ $orderPrice }}</p>
        <p>Product title: {{ $orderName }}</p>
        <p>Quantity: {{ $orderQuantity }}</p>
        <p>Description: {{ $orderDescription }}</p>

</body>
</html>

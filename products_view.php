
<?php
$all_products = json_decode(file_get_contents("products.json"), true);
if(!$all_products){
    $all_products = [];
}
$total = 0;
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Price</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($all_products as $key => $product) { ?>
    <tr>
      <th> <?php echo $product['product_name']; ?></th>
      <td><?php echo $product['quantity']; ?></td>
      <td><?php echo $product['price']; ?></td>
      <td><?php echo $product['quantity'] * $product['price']; ?></td>
      <td><?php echo $product['date']; ?></td>
    </tr>
    
    <?php

    $total  +=  $product['quantity'] * $product['price'];

} ?>
  </tbody>
</table>

<div>
    Total Price: <?php echo number_format( $total ); ?>
</div>
<?php
header("location: application/user/views/homeView.php");
$content = file_get_contents('tmp/cart.txt');
$explode_fullname = explode('-', $content);
print_r($explode_fullname);
echo "<br/>";
$total = $explode_fullname[0];
$id = $name = $price = $new_price = $unit = $qty = $sum = array();
$total_bill = 0;
for ($i = 0; $i < (count($explode_fullname) - 1) / 7; $i++) {
    $id[$i] = $explode_fullname[7 * $i + 1];
    $name[$i] = $explode_fullname[7 * $i + 2];
    $price[$i] = $explode_fullname[7 * $i + 3];
    $new_price[$i] = $explode_fullname[7 * $i + 4];
    $unit[$i] = $explode_fullname[7 * $i + 5];
    $qty[$i] = $explode_fullname[7 * $i + 6];
    $sum[$i] = $explode_fullname[7 * $i + 7];
}
print_r($id);
echo "<br/>";
print_r($name);
echo "<br/>";
print_r($price);
echo "<br/>";
print_r($new_price);
echo "<br/>";
print_r($unit);
echo "<br/>";
print_r($qty);
echo "<br/>";
print_r($sum);
echo "<br/>";

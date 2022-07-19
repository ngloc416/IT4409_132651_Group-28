<?php
require_once "../models/Product.php";
require_once "../../../library/dbhelper.php";
class productController
{
    public function getDetailProduct($pid)
    {
        $sql = 'select * from sanpham where product_id = ' . $pid . '';

        $product = executeResult($sql);
        $id = $product[0]['product_id'];
        $name = $product[0]['name'];
        $price = $product[0]['price'];
        $newprice = $product[0]['newprice'];
        $date = $product[0]['date'];
        $amount = $product[0]['amount'];
        $sold = $product[0]['sold'];
        $unit = $product[0]['unit'];
        $image = [];

        $sql = 'SELECT pic from hinhanh where hinhanh.product_id = ' . $id . '';
        $imageList = executeResult($sql);

        for ($j = 0; $j < count($imageList); $j++) {
            $image[] = $imageList[$j]['pic'];
        }

        return new Product($id, $name, $price, $newprice, $date, $amount, $sold, $unit, $image);
    }
}

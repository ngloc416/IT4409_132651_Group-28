<?php
include_once("../models/tmpProduct.php");

class cartController
{
    public function __construct()
    {
    }

    public function showList()
    {
        $content = file_get_contents('../../../tmp/cart.txt');
        $explode_content = explode('-', $content);
        $list = array();
        for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
            $tmp = new tmpProduct($explode_content[7 * $i + 1], $explode_content[7 * $i + 2], $explode_content[7 * $i + 3], $explode_content[7 * $i + 4], $explode_content[7 * $i + 5], $explode_content[7 * $i + 6], $explode_content[7 * $i + 7]);
            $list[] = $tmp;
        }
        return $list;
    }

    public function showBill()
    {
        $content = file_get_contents('../../../tmp/cart.txt');
        $explode_content = explode('-', $content);
        $total[0] = $explode_content[0];
        $total[1] = 0;
        for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
            $total[1] += $explode_content[7 * $i + 7];
        }
        return $total;
    }

    public function delete($id)
    {
        $content = file_get_contents('../../../tmp/cart.txt');
        $explode_content = explode('-', $content);
        $total = $explode_content[0];
        $list = array();
        for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
            if ($explode_content[7 * $i + 1] == $id) {
                $total -= $explode_content[7 * $i + 6];
            } else {
                $tmp = new tmpProduct($explode_content[7 * $i + 1], $explode_content[7 * $i + 2], $explode_content[7 * $i + 3], $explode_content[7 * $i + 4], $explode_content[7 * $i + 5], $explode_content[7 * $i + 6], $explode_content[7 * $i + 7]);
                $list[] = $tmp;
            }
        }
        $fp = fopen('../../../tmp/cart.txt', 'w');
        fwrite($fp, $total);
        for ($i = 0; $i < count($list); $i++) {
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->id);
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->name);
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->new_price);
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->price);
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->unit);
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->qty);
            fwrite($fp, '-');
            fwrite($fp, $list[$i]->sum);
        }
        fclose($fp);
        header("location: cartView.php");
    }
}

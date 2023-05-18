<?php
if (!isset($ROOT_PATH)) {
    header("Location:../index.php");
}
require("Products.php");
class Calculator
{
    // get products by array consits of ids
    public static function GetProductsById($ids)
    {
        return array_filter($GLOBALS["ProductData"], function ($product) use ($ids) {
            return in_array($product["id"], $ids);
        });
    }

    // generate table to checkout
    public static function Checkout($id_count)
    {
        $table_html = <<<ECHO
        <table>
            <tr>
                <th>Product</th>
                <th>Count</th>
                <th>Price</th>
            </tr>
        ECHO;
        $subtotal_price = 0;
        $ids = array_keys($id_count);
        foreach ($GLOBALS["ProductData"] as $product) {
            if (in_array($product["id"], $ids) && $id_count[strval($product["id"])] > 0) {
                $product_count = $id_count[strval($product["id"])];
                $product_name = $product["name"];
                $product_price = $product["price"];
                $count_price = $product_price * $product_count;
                $subtotal_price += $count_price;
                $table_rows = <<<ECHO
                <tr>
                    <td>$product_name</td>
                    <td>$product_count</td>
                    <td class="checkout-price">$count_price</td>
                </tr>
                ECHO;
                $table_html = $table_html . $table_rows;
            }
            $subtotal_html = <<<ECHO
            <tr>
                <td colspan="2"><b>Subtotal Price</b></td>
                <td class="checkout-price">$subtotal_price</td>
            </tr>
            ECHO;
            $tax = $subtotal_price * 0.13;
            $round_tax = round($tax, 2);
            $tax_html = <<<ECHO
            <tr>
                <td colspan="2"><b>HST</b></td>
                <td class="checkout-price">$round_tax</td>
            </tr>
            ECHO;
            $total_price = $subtotal_price + $tax;
            $round_total_price = round($total_price, 2);
            $total_html = <<<ECHO
            <tr>
                <td colspan="2"><b>Total Price</b></td>
                <td class="checkout-price">$round_total_price</td>
            </tr>
            ECHO;
        }
        return $table_html . $subtotal_html . $tax_html . $total_html . "</table>";
    }
}
?>
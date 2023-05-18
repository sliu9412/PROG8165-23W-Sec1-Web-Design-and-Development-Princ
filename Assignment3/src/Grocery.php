<?php
// import data
require(ROOT_PATH . "/src/data.php");
// validators class
require(ROOT_PATH . "/src/Validator.php");
//prince and tax
require(ROOT_PATH . "/src/ProvinceTax.php");
class Grocery extends Validators
{
    private $data;
    public $is_valid = false;
    public function __construct()
    {
        parent::__construct();
        $this->data = $GLOBALS["ProductData"];
    }

    // hold product data when user submit form
    public function StoreNewData($request)
    {
        for ($i = 0; $i < count($this->data); $i++) {
            $this->data[$i]["count"] = $request["product-id-$i"];
        }
        $this->Validate($request);
    }

    private function Validate($request)
    {
        $name_validator = $this->EmptyValidator($request, "user-form-name", "Name");
        $phone_validator = $this->RegexValidator($request, "user-form-phone", "/^\d{3}-\d{3}-\d{4}$/", "Phone", "Phone Number");
        $email_validator = $this->RegexValidator($request, "user-form-email", "/^\w+@\w+\.\w+$/", "Email");
        $password_validator = $this->PasswordFormatValidator($request, "user-form-password");
        $confirm_password_validator = $this->PasswordConfirmValidator($request, "user-form-confirm-password");
        $postcode_validator = $this->RegexValidator($request, "user-form-post-code", "/^[A-Za-z]\d[A-Za-z]\s{0,1}\d[A-Za-z]\d$/", "Postcode");
        $address_validator = $this->EmptyValidator($request, "user-form-address", "Address");
        $city_validator = $this->EmptyValidator($request, "user-form-city", "City");
        $province_validator = $this->ProvinceValidator($request, "user-form-province");
        $card_number_validator = $this->RegexValidator($request, "user-form-card-number", "/^\d{4}-\d{4}-\d{4}-\d{4}$/", "card_number", "Card number");
        $card_year_validator = $this->RegexValidator($request, "user-form-card-expiry-year", "/^\d{4}$/", "card_expiry_year", "Card Expiry Year");
        $card_month_validator = $this->RegexValidator($request, "user-form-card-expiry-month", "/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/i", "card_expiry_month", "Card Expiry Month");
        $card_expiry_validator = $this->CardDueValidator();
        $minial_purchase_validator = $this->MinimalPurchaseValidator($this->data);
        if (
            $name_validator &&
            $phone_validator &&
            $email_validator &&
            $password_validator &&
            $confirm_password_validator &&
            $postcode_validator &&
            $address_validator &&
            $city_validator &&
            $province_validator &&
            $card_number_validator &&
            $card_year_validator &&
            $card_month_validator &&
            $card_expiry_validator &&
            $minial_purchase_validator
        ) {
            $this->is_valid = true;
        }
    }

    public function Generate_Cart()
    {
        $products_html = "";
        foreach ($this->data as $product) {
            $product_id = $product["id"];
            $product_name = $product["name"];
            $product_price = $product["price"];
            $product_unit_price = $product["unit_price"];
            $product_img = $product["img"];
            $product_html = <<<ECHO
            <div class="product-item">
                <div class="img-container">
                    <img src="$product_img" alt="$product_name">
                </div>
                <div class="item-info">
                    <p class="item-price">$$product_price</p>
                    <p class="unit-price">$product_unit_price</p>
                    <h3>$product_name</h3>
                </div>
                <div class="add-to-cart btn">
                    <img src="./images/Plus.svg" alt="add to cart" data-id="product-id-$product_id">
                </div>
            </div>
            ECHO;
            $products_html = $products_html . $product_html;
        }
        return $products_html;
    }

    public function Generate_Recept()
    {
        $recept_html = "";
        $hidden_html = "";
        foreach ($this->data as $product) {
            $product_id = $product["id"];
            $product_name = $product["name"];
            $product_count = $product["count"];
            $product_price = $product["price"];
            $product_subtotal_price = $product_price * $product_count;

            $hidden_html = $hidden_html . <<<ECHO
            <input type="hidden" data-product-name="$product_name" data-product-price="$product_price" name="product-id-$product_id" value="$product_count">
            ECHO;

            if ($product["count"] > 0) {
                $recept_item_html = <<<ECHO
                    <li>
                        <span class="product-name">- $product_name</span>
                        <span class="product-subtotal-price" data-id="product-id-$product_id">$product_subtotal_price</span>
                        <div class="item-calculator">
                            <input type="button" class="btn" value="-" data-id="product-id-$product_id">
                            <span class="product-count" data-id="product-id-$product_id">$product_count</span>
                            <input type="button" class="btn" value="+" data-id="product-id-$product_id">
                        </div>
                    </li>
                ECHO;
                $recept_html = $recept_html . $recept_item_html;
            }

        }
        return $hidden_html . $recept_html;
    }

    public function Generate_Province_Tax()
    {
        $selected_tax = $this->post_info["tax"];
        $selected_province = $this->post_info["province"];
        $selections_html = "<option value=\"\">-- Please select a province/territory --</option>";
        foreach (array_keys($GLOBALS["Province_Tax"]) as $province) {
            $tax = $GLOBALS["Province_Tax"][$province];
            if ($selected_tax == $tax && $selected_province == $province) {
                $selections_html = $selections_html . "<option value=\"$tax,$province\" selected>$province</option>";
            } else {
                $selections_html = $selections_html . "<option value=\"$tax,$province\">$province</option>";
            }
        }
        return $selections_html;
    }

    private function Calculate_Table()
    {
        $table_html = <<<ECHO
        <table class="calculate-table">
            <tr>
                <th>Product</th>
                <th>Count</th>
                <th>Price</th>
            </tr>
        ECHO;
        $subtotal_price = 0;
        foreach ($this->data as $product) {
            if ($product["count"] > 0) {
                $product_count = $product["count"];
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
            $tax = $subtotal_price * $this->post_info["tax"];
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

    public function Generate_Modal()
    {
        function WrapField($field_name, $str)
        {
            return "<tr><td class='field'>$field_name</td><td>$str</td></tr>";
        }

        $modal_html = "";
        foreach (array_keys($this->post_info) as $field) {
            switch ($field) {
                case "name":
                    $modal_html = $modal_html . WrapField("Username", $this->post_info['name']);
                    break;
                case "phone":
                    $modal_html = $modal_html . WrapField("Phone Number", $this->post_info['phone']);
                    break;
                case "email":
                    $modal_html = $modal_html . WrapField("Email", $this->post_info['email']);
                    break;
                // case "password":
                //     $modal_html = $modal_html . WrapField("Password", $this->post_info['password']);
                //     break;
                case "postcode":
                    $modal_html = $modal_html . WrapField("Postcode", $this->post_info['postcode']);
                    break;
                case "address":
                    $modal_html = $modal_html . WrapField("Address", $this->post_info['address']);
                    break;
                case "city":
                    $modal_html = $modal_html . WrapField("City", $this->post_info['city']);
                    break;
                case "province":
                    $modal_html = $modal_html . WrapField("Province", $this->post_info['province']);
                    break;
                case "card_number":
                    $modal_html = $modal_html . WrapField("Credit Card Number", $this->post_info['card_number']);
                    break;
                default:
                    break;
            }
        }
        $modal_html = $modal_html . WrapField("Check Out", $this->Calculate_Table());
        return $modal_html;
    }
}

?>
<?php
class Validators
{
    public $error_messages;
    public $post_info;
    public function InputValidator($request, $node)
    {
        $data = trim($request[$node]);
        if ($data != "") {
            return $data;
        }
        return false;
    }

    public function EmptyValidator($request, $node, $field)
    {
        $data = $this->InputValidator($request, $node);
        $lowcase_field = strtolower($field);
        if (!$data) {
            $this->error_messages[$lowcase_field] = "$field should not be empty";
            return false;
        }
        $this->post_info[$lowcase_field] = $data;
        return true;
    }

    public function RegexValidator($request, $node, $regex_pattern, $field, $field_alias = "")
    {
        $data = $this->InputValidator($request, $node);
        $lowcase_field = strtolower($field);
        if (!$data) {
            if ($field_alias) {
                $this->error_messages[$lowcase_field] = "$field_alias should not be empty";
            } else {
                $this->error_messages[$lowcase_field] = "$field should not be empty";
            }
            return false;
        } else {
            if (!preg_match($regex_pattern, $data)) {
                if ($field_alias) {
                    $this->error_messages[$lowcase_field] = "$field_alias format is invalid";
                } else {
                    $this->error_messages[$lowcase_field] = "$field format is invalid";
                }
                $this->post_info[$lowcase_field] = $data;
                return false;
            }
        }
        $this->post_info[$lowcase_field] = $data;
        return true;
    }

    public function PasswordFormatValidator($request, $node)
    {
        $data = $this->InputValidator($request, $node);
        if (!$data) {
            $this->error_messages["password"] = "Password should not be empty";
            return false;
        } else {
            if (strlen($data) < 6) {
                $this->error_messages["password"] = "Password length should be six at least";
                return false;
            }
            $this->post_info["password"] = $data;
        }
        return true;
    }

    public function PasswordConfirmValidator($request, $node)
    {
        $data = $this->InputValidator($request, $node);
        if (!$data) {
            $this->error_messages["password"] = "Please repeat password to confirm";
            return false;
        } else {
            if ($data != $this->post_info["password"]) {
                $this->error_messages["confirm_password"] = "Confirm password is different from the password";
                return false;
            }
            $this->post_info["confirm_password"] = $data;
        }
        return true;
    }

    public function ProvinceValidator($request, $node)
    {
        try {
            $pair = preg_split("/,/", $request[$node]);
            if (count($pair) == 2) {
                $tax = floatval($pair[0]);
                $province = $pair[1];
                if (in_array($province, array_keys($GLOBALS["Province_Tax"])) && in_array($tax, array_values($GLOBALS["Province_Tax"]))) {
                    $this->post_info["province"] = $province;
                    $this->post_info["tax"] = $tax;
                    return true;
                }
            } else {
                $this->error_messages["province"] = "Please select a province";
                return false;
            }
        } catch (\Exception $e) {
            //throw $th;
            $this->error_messages["province"] = "Please select a province";
            return false;
        }

    }

    public function CardDueValidator()
    {
        $current_time = new DateTime("now");
        $card_expiry_year = $this->post_info['card_expiry_year'];
        $card_expiry_month = $this->post_info['card_expiry_month'];
        try {
            $card_expiry_time = new DateTime("$card_expiry_year-$card_expiry_month-31");
            if ($card_expiry_time < $current_time) {
                $this->error_messages["card_expiry_year"] = "Credit card has expiried";
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function MinimalPurchaseValidator($data)
    {
        $total_price = 0;
        foreach ($data as $product) {
            $total_price += $product["price"] * $product["count"];
        }
        if ($total_price < 10) {
            $this->error_messages["is_reach_minimal_pruchasing_price"] = "Minimum purchase should be of $10";
            return false;
        }
        return true;
    }

    public function __construct()
    {
        $fields = [
            "name" => "",
            "phone" => "",
            "email" => "",
            "password" => "",
            "confirm_password" => "",
            "postcode" => "",
            "address" => "",
            "city" => "",
            "province" => "",
            "tax" => "",
            "card_number" => "",
            "card_expiry_year" => "",
            "card_expiry_month" => "",
            "is_reach_minimal_pruchasing_price" => "",
        ];
        $this->post_info = $fields;
        $this->error_messages = $fields;
    }
}
?>
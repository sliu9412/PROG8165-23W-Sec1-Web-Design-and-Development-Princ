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
        // $lowcase_field = strtolower($field);
        if (!$data) {
            $this->error_messages[$node] = "$field should not be empty";
            return false;
        }
        $this->post_info[$node] = $data;
        return $request[$node];
    }

    public function RegexValidator($request, $node, $regex_pattern, $field, $field_alias = "")
    {
        $data = $this->InputValidator($request, $node);
        // $lowcase_field = strtolower($field);
        if (!$data) {
            if ($field_alias) {
                $this->error_messages[$node] = "$field_alias should not be empty";
            } else {
                $this->error_messages[$node] = "$field should not be empty";
            }
            return false;
        } else {
            if (!preg_match($regex_pattern, $data)) {
                if ($field_alias) {
                    $this->error_messages[$node] = "$field_alias format is invalid";
                } else {
                    $this->error_messages[$node] = "$field format is invalid";
                }
                $this->post_info[$node] = $data;
                return false;
            }
        }
        $this->post_info[$node] = $data;
        return $request[$node];
    }

    public function __construct()
    {
        $fields = [
            "teamName" => "",
            "collegeName" => "",
            "collegeAddress" => "",
            "collegeCity" => "",
            "collegeProvince" => "",
            "firstStudentName" => "",
            "firstStudentEmail" => "",
            "secondStudentName" => "",
            "secondStudentEmail" => "",
        ];
        $this->post_info = $fields;
        $this->error_messages = $fields;
    }
}
?>
<?php

class UserValidator{
    private $data;
    private $errors=[];
    private static $fields=["username","email","password"];

    public function __construct($post_data){
        $this->data=$post_data;
    }

    public function validateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        return $this->errors;
    }

    public function validateUsername(){
        $val=trim($this->data["username"]);
        if(empty($val)){
            $this->adderror("username","username is empty");
        }else{
            if(!preg_match("/^[a-zA-Z0-9]{6,12}$/",$val)){
                $this->adderror("username","Username must be 6-12 letters and alphanumeric");
            }
        }
    }

    public function validateEmail(){

        $val=trim($this->data["email"]);

        if(empty($val)){
            $this->adderror("email","email is empty");
        }else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->adderror("email","email must be a valid email");
            }
        }

    }

    public function validatePassword(){
        $val=trim($this->data["password"]);
        if(empty($val)){
            $this->adderror("password","password is empty");
        }else{
            if(!preg_match("/^[a-zA-Z0-9]{6,12}$/",$val)){
                $this->adderror("password","password must be 6-12 letters and alphanumeric");
            }
        }
    }

    public function adderror($key,$val){
        $this->errors[$key]=$val;
    }
}

?>
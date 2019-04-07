<?php

/**
 * Takes in all user info from the login/register pages, ensures no empty fields and validates them all using AJAX
 */
class UsersAjax extends Controller
{

    public function createAccountAjax(){
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            echo "in ajax call";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "post request ajax";
            if (isset($_POST["submit"])) {
                //check they are set later
                $name = $_POST["name"];
                $username = $_POST["username"];
                $age = $_POST["age"];
                $password = $_POST["password"];


                //how do we reference the model
                $model=$this->model("AccountModel");
                $success=$model->createAccount($username,$password);
                if($success){
                    echo "successfully inserted";
                }
                else{
                    echo "insert failed";
                }
            }
        } else {
            return $this->view("Users/createAccountAjax");
        }
    }


    public function index()
    {

    }
}
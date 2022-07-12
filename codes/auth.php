<?php
include_once('controllers/Register.php');
include_once('controllers/LoginController.php');

$auth = new LoginController;

if(isset($_POST['logout_btn'])){
    $checkLogout = $auth->logout();
    if($checkLogout){
        redirect("Logged Out", "index.php");
    }
}

if(isset($_POST['login_btn'])){
    $uname = validateInput($db->conn,$_POST['uname']);
    $password = validateInput($db->conn,$_POST['password']);

    $checkLogin = $auth->userLogin($uname,$password);

    if($checkLogin){
        redirect("Login Success", "index.php");
    } else {
        redirect("Login Failed", "login.php");
    }
}

if(isset($_POST['register_btn'])){
    $fname = validateInput($db->conn,$_POST['fname']);
    $lname = validateInput($db->conn,$_POST['lname']);
    $email = validateInput($db->conn,$_POST['email']);
    $password = validateInput($db->conn,$_POST['password']);
    $uname = validateInput($db->conn,$_POST['uname']);
    $confirm_password = validateInput($db->conn,$_POST['confirm_password']);

    $register = new Register;
    $result_password = $register->confirmPassword($password,$confirm_password);

    if($result_password){
        $result_user = $register->isUserExists($email);
        if($result_user){
            redirect("email already exist", "register.php");
        } else {
            $register_query = $register->registration($fname,$lname,$email,$password,$uname);
            if($register_query){
                redirect("registered success", "login.php");
            } else {
                redirect("something went wrong", "register.php");
            }
        }

    } else {
        redirect("wrong password", "register.php");
    }
}

?>
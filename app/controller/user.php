<?php
include("model/model_user.php");
class user
{
    public $m;
    function __construct()
    {
        $this->m = new model_user;
    }
    //class
    
    
    function login()
    {
        if ($_POST == NULL) {
            header('location:' . BASE_URL);
            exit();
        }
        $u = strip_tags($_POST['u']);
        $p = strip_tags($_POST['p']);
        if (!get_magic_quotes_gpc()) {
            $u = mysql_real_escape_string($u);
            $p = mysql_real_escape_string($p);
        }
        $this->m->login($u, $p);
        header('location:' . BASE_URL);
        
    } //login
    function logout()
    {
        if (isset($_SESSION['authed_user'])) {
            unset($_SESSION['authed_user']);
        }
        //var_dump($_SESSION);
        //    die();
        header('location:' . BASE_URL);
        exit();
    }
}
?>
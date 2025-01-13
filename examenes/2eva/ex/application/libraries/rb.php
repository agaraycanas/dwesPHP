<?php
class Rb
{
    function __construct()
    {
        include(APPPATH . '/config/database.php');
        include(APPPATH . '/third_party/rb/rb.php');
        
        $host = $db[$active_group]['hostname'];
        $user = $db[$active_group]['username'];
        $pass = $db[$active_group]['password'];
        $db = $db[$active_group]['database'];

        error_reporting(0);
        R::setup("mysql:host=$host;dbname=$db", $user, $pass);
        error_reporting(E_ALL);
    }
}

?>
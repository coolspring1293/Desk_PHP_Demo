<?php
    /**
     * Example 1 - This is a minimalist example.
     * All classes in the jqmPhp package can be converted
     * to string and printed with an 'echo' function.
     * @package jqmPhp
     * @filesource
     */

    /**
     * Include the jqmPhp class.
     */
    include 'jqmPhp/lib/jqmPhp.php';
    
    $j = new jqmPhp();
    $p = new jqmPage('NEW POST');

    if(isset($_REQUEST['uid'])) {

        $id = $_REQUEST["uid"];
        $pwd = $_REQUEST["pwd"];
        $age = $_REQUEST["age"];
        $desc = $_REQUEST["msg"];


        $con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("app_liuw53", $con);
        $sql = 'insert into user values("'. $id . '", "'. $pwd .'", '. $age .', "'. $desc .'")';
        ///$sql = 'insert into user values("ffsdfasfdsfdfaf", "ddfadsd", 20, "iiadsfai")'; 
        if(mysql_query($sql)) {
            $j->addBasicPage('Register Successfully!', 'Register Successfully!', '<h1>Welcome!</h1>
            <p>You can return home or log in.<br></p><a href="index.php">Home</a> | <a href="#li.php">Log in</a>');
            $sql = 'insert into post values( "' . $id . '", now(), 1, "' . 'Hello everyone! I joined just now. The following is my self-descpeiction: '. $desc . '")';
            mysql_query($sql);
        }
        else {
           $j->addBasicPage('Register Failed!', 'Register Failed!', '<h1>Sorry</h1>
            <p>You can return home or log in.<br></p><a href="index.php">Home</a> | <a href="#li.php">Log in</a>');
        }
        mysql_close($con);
    }

   

    


    
    $j->addPage($p);
    echo $j;
?>
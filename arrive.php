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

    $uName = $_COOKIE['UserName'];
    if(!empty($uName)) 
    {
        $con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("app_liuw53", $con);
        $uName = $_COOKIE['UserName'];

        $sql = 'insert into post values( "' . str_replace(" ", "", $uName) . '", now(), 1, "I Arrived Library.")';
        if(mysql_query($sql))
        {
            //echo '<a href="index.php">BACK</a>'
            $p->addContent('<script language="JavaScript" >location.href = "index.php" </script>');
        }
        else 
        {
            $p->addContent('<script language="JavaScript" >location.href = "check.php" </script>');
        }
        mysql_close($con);
    }

    $j->addPage($p);
    echo $j;
    $p->addContent('<script language="JavaScript" >location.href = "index.php" </script>');
?>
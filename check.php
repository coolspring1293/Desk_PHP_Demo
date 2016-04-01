<?php
    /**
     * Example 2 - Adding Pages
     * @package jqmPhp
     * @filesource
     */

    /**
     * Include the jqmPhp class.
     */
    include 'jqmPhp/lib/jqmPhp.php';

    /**
     * Create a new jqmPhp object.
     */
    $j = new jqmPhp();

    /**
     * Create a new jqmPage object.
     */
    $p = new jqmPage('Check');
    $p->theme('b');
    $p->title('Check');
    $p->header()->addButton('Home', 'index.php#', 'a', 'arrow-l');
    $p->header()->addButton('Log In', 'li.php#', 'b', 'arrow-r');
    $p->header()->theme('a');
    $p->addContent('<h1>Sign IN or OUT Now</h1>');
    $uName=$_COOKIE['UserName'];
    $isLog = 0;
    if (!empty($uName)) 
    {
        setcookie("UserName",$uName, time()+60*60*36);
        $p->content()->add('<p> Hi, ' . $uName .'!</p>');
        $isLog = 1;
        $p->addContent('<a href="arrive.php#" data-role="button" data-theme="a">Arrive</a>');

        $p->addContent('<a href="leave.php#" data-role="button">Leave</a>');
    }
    else 
    {
        $p->addContent('<p>Please log in or register first!</p>');
        $p->addContent('<a href="li.php#" data-role="button" data-theme="a">Log In</a>');
        //$p->addContent('<a href="li.php#" data-role="button">Leave</a>');
    }
    
    $p->footer()->title('All Right Reserved. Created by Liu Wang @ 2016.');
    $p->footer()->position('fixed');
    $p->footer()->theme('a');
    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
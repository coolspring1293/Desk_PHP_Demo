<?php
    /**
     * Example 4 - Adding Form Elements
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
     * Config 'html' and 'head' tag.
     */
    $j->head()->title('NEW POST');

    /**
     * Create and config a jqmPage object.
     */
    $p = new jqmPage('NEW POST');
    $p->theme('d')->title('NEW POST');

    $bt = $p->header()->addButton('', 'index.php#', 'b', 'home', false, false, true);
    $bt->rel('external')->attribute('data-iconpos', 'notext');

    $p->header()->theme('b');

    /**
     * Create and config a new jqmForm object and add items.
     */
    $p->content()->add('<h1>Welcome to our Desk!</h1>');

    $uName=$_COOKIE['UserName'];
    $isLog = 0;



    if (!empty($uName)) 
    {
        $p->content()->add('<p> Hi, ' . $uName .'!</p>');
        $isLog = 1;
        $form = $p->addContent(new jqmForm(), true);
        $form->action('new.php?rand='.rand(0, 9999))->method('POST');
       /**
         * Add a jqmTextarea object.
         */
        $form->add('<h3>Write your post:</h3>');

        $form->add(new jqmTextarea('msg', 'msg', '', "80", "30",'', 'b', false));

        $form->add(new jqmInput('submit', 'submit', 'submit', 'Post', '', 'a', true));

        


    }
    else 
    {
        $p->addContent('<p>Please log in or register first!</p>');
        $p->addContent('<a href="li.php#" data-role="button" data-theme="a">Log In</a>');
    }



    if(isset($_REQUEST['msg'])) {
        $con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
        if (!$con)
        {
        die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("app_liuw53", $con);
        $sql = 'insert into post values( "' . str_replace(" ", "", $uName) . '", now(), 1, "' . $_REQUEST['msg']. '")';
        if(mysql_query($sql)) 
        {
            $p->addContent('<p>Post Successfully!</p>');
        }
        else 
        {
            $p->addContent('<p>Post Failed!</p>'.'<p>' . $sql  .'</p><p>' .$uName. '</p>');
        }
        


        mysql_close($con);
    }


    $p->addContent('<a href="index.php#" data-role="button">Back</a>');


    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
?>
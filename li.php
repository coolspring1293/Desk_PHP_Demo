<script type="text/javascript" src="jquery.min.js"></script>  
<script>  
    $(document).ready(function() {  
        //alert('b');  
       setTimeout(function(){$('#use_coo').submit();},0);  
    });  
</script>  

<?php
 /**
 * Form - Ajax Disabled
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
 $p = new jqmPage('Hello World');
 $p->title('Hello World');
 $bt = $p->header()->addButton('', 'index.php#', 'a', 'home', false, false, true);
 $bt->rel('external')->attribute('data-iconpos', 'notext');
 $p->addContent('<h1>Log In</h1>');


 
 if(isset($_REQUEST['username'])) {
 	//$p->addContent($_REQUEST['username'] . '<br>');
 	$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
    if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("app_liuw53", $con);
    $result = mysql_query('select count(*) as ct from user where username = "' . $_REQUEST['username'] . '" and password = "' . $_REQUEST['password']. '"');
    $row = mysql_fetch_array($result);
    $tmm = $row['ct'];
 	if ($tmm == 1) 
 	{
 		$p->addContent('<p style="padding:20px;">Right Username!</p>');
 		echo '<form id="use_coo" action="index.php" method="post"> <input type="text" name="username" value=" '. $_REQUEST['username'] .' "/></form>';
 		echo '<script language="JavaScript" >location.href = "index.php" </script>';
 	}
 	else 
 	{
 		$p->addContent('<p style="padding:20px" >Wrong username or password.</p>');
	}
}
 
 /**
 * Create a new jqmForm object.
 */
 $form = new jqmForm('form1');
 $form->action('li.php')->method('post');
 $form->add(new jqmInput('username', 'username', 'text', '', 'Username', '', true));
 $form->add(new jqmInput('password', 'password', 'password', '', 'Password', '', true));
 $form->add(new jqmInput('submit', 'submit', 'submit', 'log in', '', 'b', true));

 $send = $form->add(new jqmButton(), true);
 $send->text('register')->href("register.php#");
 /**
 * Disable Form Ajax
 */
 $form->attribute('data-ajax', 'false');
 
 
 /**
 * Add the page to jqmPhp object.
 */    
 $p->addContent($form);
 
 
 /**
 * Adding Source Code Links.
 */
 $p->addContent('<p>&nbsp;</p>');

 
 /**
 * Add the page to jqmPhp object.
 */
 $j->addPage($p);
 
 /**
 * Generate the HTML code.
 */
 echo $j;
?>


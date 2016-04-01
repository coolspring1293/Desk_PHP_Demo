<?php
    /**
     * Desk index.php
     * @package jqmPhp
     * Luther:Liu Wang.
     */

    /**
     * Include the jqmPhp class.
     */
    include 'jqmPhp/lib/jqmPhp.php';
    header("Content-Type: text/html; charset=UTF-8");
    $con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
    if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("app_liuw53", $con);
    $result = mysql_query("SELECT * FROM post  order by create_time desc");

    /**
     * Create a new jqmPhp object.
     */
    $j = new jqmPhp();

    /**
     * Con fig 'html' and 'head' tag.
     */

    
    $j->html()->doctype('html');
    $j->head()->title('DESK');
    $j->head()->css('http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css');
    $j->head()->jq('http://code.jquery.com/jquery-1.4.4.min.js');
    $j->head()->jqm('http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js');
    $j->head()->add(new jqmLink('css/custom.css'));         // Adding a custom CSS.
    $j->head()->add(new jqmScript('js/custom.js'));         // Adding a custom JavaScript.
    $j->body()->attribute('onload', 'initCustom();');     // Adding a custom attribute to 'body' tag.

    /**
     * Create and config a jqmPage object.
     * Most methods return the object itself allowing call
     * another method on the object in sequence.
     */
    $p = new jqmPage('HOME');
    $p->theme('b')
    ->title('HOME')
    ->header()->addButton('About', 'ref.php#', 'a', 'arrow-l')
              ->addButton('Log in', 'li.php#', 'b', 'arrow-r')
              ->theme('a');
    /**
     * addContent() is alias to content()->add().
     */

    //setcookie("UserName","hhhh",time()+20);
    
    $p->content()->add('<h1>Hello April Fool！</h1>');

    if (!empty($_REQUEST['username'])) {
        $uName=$_REQUEST['username'] ;
        $p->content()->add('<h1> Welcome Back, ' . $uName .'!</h1>');
        setcookie("UserName",$_REQUEST['username'],time()+ 60*60*36);
    } 
    elseif (!empty($_COOKIE['UserName'])) 
    {
        $uName=$_COOKIE['UserName'];
        $p->content()->add('<h1> Hi, ' . $uName .'!</h1>');
    }
    
    $cp = $p->addContent(new jqmCollapsible(), true);
    $cp->title('Notices')->collapsed(true)->add('<p>插排一起用吧😁. by liuw53</p><p>有什么需要反馈的，New Post写下来就好。</p>')->theme('a');


    $p->content()->add('<h1>All POST.</h1>');
    /**
     * Create and config a new jqmGrid object and add items.
     */
    $ddd = '2016.03.30 12:05';

    function randColor(){
    $colors = array();
    for($i = 0;$i<6;$i++){
        $colors[] = dechex(rand(0,15));
    }
    return implode('',$colors);
    }

    $tmpcolor = randColor();
	$p->addContent('<HR style="border:3 double #' . $tmpcolor  .'" color=#' . $tmpcolor  .' SIZE=20>');


    $count = 0;

    while($row = mysql_fetch_array($result))
    {
        $tmpcolor = randColor();
        $rmp = $count%19+1;
        $p->addContent('<h2>' . $row['username'] . '</h2>');
        $p->addContent('<img src="jqmPhp/docs/cat/cat' . $rmp .'.png" height ="80px">');
        $p->addContent($row['create_time']);
        $p->addContent('<h3>' . $row['detail'] . '<h3>');
        $p->addContent('<HR style="border:3 double #' . $tmpcolor  .'" color=#' . $tmpcolor  .' SIZE=2>');
        $count ++;
    }
    
    $p->addContent(new jqmButton('', '', '', 'a', 'new.php#', 'New Post', 'arrow-l', false, true));
    $p->addContent(new jqmButton('', '', '', 'b', 'javascript:scroll(0,0)', 'Top', 'arrow-u', false, true));
    $p->addContent(new jqmButton('', '', '', 'c', 'more.php#', 'More', 'arrow-r', false, true));
    /**
     * Generate the HTML code.
     */

    $p->addContent('<a href="check.php" data-role="button">Sign</a>');


    $list3 = new jqmListviem();
	 $list3->inset(true);
     //
	 $list3->addThumb('YouTube', 'www.youtube.com', 'http://www.youtube.com', 'jqmPhp/docs/images/youtube.png');
     $list3->addThumb('Facebook', 'www.facebook.com', 'https://www.facebook.com/liuw53', 'jqmPhp/docs/images/facebook.jpg');
     $list3->addThumb('Sun Yat-Sen University', 'www.sysu.edu.cn', 'http://www.sysu.edu.cn/2012/en/index.htm', 'jqmPhp/docs/images/SYSU.jpg');
	 $list3->addThumb('Github', 'www.github.com', 'https://github.com/coolspring1293', 'jqmPhp/docs/images/Github.jpg');
     $list3->addThumb('Flickr', 'www.flickr.com', 'http://www.flickr.com', 'jqmPhp/docs/images/flickr.png');
	 $list3->addThumb('Picasa', 'picasaweb.google.com', 'http://picasaweb.google.com', 'jqmPhp/docs/images/picasa.png');
	 $list3->addThumb('Feedburner', 'www.feedburner.com', 'http://www.feedburner.com', 'jqmPhp/docs/images/feedburner.png');
	 $p->addContent($list3);


    $j->addPage($p);
    echo $j;

    mysql_close($con);
?>
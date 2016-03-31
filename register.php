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
    $j->head()->title('REGISTER');

    /**
     * Create and config a jqmPage object.
     */
    $p = new jqmPage('REGISTER');
    $p->theme('b')->title('REGISTER');

    $bt = $p->header()->addButton('', 'index.php#', 'a', 'home', false, false, true);
    $bt->rel('external')->attribute('data-iconpos', 'notext');

    $p->header()->theme('a');

    /**
     * Create and config a new jqmForm object and add items.
     */
    $p->content()->add('<h1>Welcome to our Desk!</h1>');
    $form = $p->addContent(new jqmForm(), true);
    $form->action('register_ok.php#')->method('POST');

    /**
     * Add some jqmInput objects.
     */
    $form->add('<h3>Basic Info</h3>');
    $form->add(new jqmInput('uid', 'uid', 'text', '', 'Username', '', true));
    $form->add(new jqmInput('pwd', 'pwd', 'password', '', 'Password', '', true));
    //$form->add(new jqmInput('pwd', 'pwd', 'password2', '', 'Password Repeat', '', true));
    

    /**
     * Add a jqmTextarea object.
     */
    $form->add('<h3>Extra Info</h3>');
    $form->add(new jqmRange('age', 'age', '18', '18', '80', 'Age:', '', true));

    $sex = $form->add(new jqmSelect('sex', 'sex', 'Sex:', '', '', true), true);
        $sex->addOption('Male', 'male', true);
        $sex->addOption('Female', 'female', false);
        $sex->inline(true)->icon('grid')->theme('a');
//$form->add('<h3>Select</h3>');

    $sel = $form->add(new jqmSelect('Constellation', 'Constellation', 'Constellation:'), true);
        $sel->add(new jqmOption('Aquarius', 'aq', true));
         $sel->add(new jqmOption('Pisces', 'pi', false));
          $sel->add(new jqmOption('Aries', 'ar', false));
           $sel->add(new jqmOption('Taurus', 'ta', false));
        
        $sel->add(new jqmOption('Gemini', 'ge', false));
          $sel->add(new jqmOption('Cancer', 'ca', false));
           $sel->add(new jqmOption('Leo', 'le', false));
            $sel->add(new jqmOption('Virgo', 'vi', false));

          $sel->add(new jqmOption('Libra', 'li', false));
            $sel->add(new jqmOption('Scorpio', 'sc', false));
             $sel->add(new jqmOption('Sagittarius', 'sa', false));
              $sel->add(new jqmOption('Capricorn', 'ca', false));
        $sel->fieldContain(true);
        $sel->theme(a);
    $form->add(new jqmTextarea('msg', 'msg', '', '80', '4', 'Self description:', '', true));

   
    $form->add('<h3>Ideology</h3>');
    

    /*
Religious Belief

Muslim
Buddhism

    */
    
    $rg = $form->add(new jqmRadiogroup('plan', 'plan', 'Religious Belief:'), true);
        $rg->addRadio('Christian', '0');
        $rg->addRadio('Muslim', '1');
        $rg->addRadio('Buddhism', '3', '');
        $rg->addRadio('Atheist', '5', '', true);
        $rg->fieldContain(true);

    
    $cg = $form->add(new jqmCheckboxgroup(), true);
        $cg->legend('Sexual Orientation:');
        $cg->addCheckbox('se1', 'se1', 'Male');
        $cg->addCheckbox('se2', 'se2', 'Female')->fieldContain(true);
        $cg->addCheckbox('se3', 'se3', 'Transgender');

    $form->add(new jqmSlider('yesno', 'yesno', 'Public:', true, 'Yes', '1', 'No', '0', '', true));

    $form->add(new jqmInput('submit', 'submit', 'submit', 'Jion now', '', 'b', true));

    /*
    $send = $form->add(new jqmButton(), true);
    $send->text('Jion Now')->href('register_ok.php');
    */
    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
?>
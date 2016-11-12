<?php
    /**
     * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
     * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
     *
     * Licensed under The MIT License
     * For full copyright and license information, please see the LICENSE.txt
     * Redistributions of files must retain the above copyright notice.
     *
     * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
     * @link          http://cakephp.org CakePHP(tm) Project
     * @package       app.View.Layouts
     * @since         CakePHP(tm) v 0.10.0.1076
     * @license       http://www.opensource.org/licenses/mit-license.php MIT License
     */

    $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
    $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
        </title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array('bootstrap.css', 'style.css'));
        echo $this->Html->script(array('jquery-2.1.4.js', 'bootstrap.js'));

        if (!isset($current_user)) {
            echo $this->Html->css(array('carousel.css'));
        }

        echo $this->Html->css('http://fonts.googleapis.com/css?family=Alegreya');
        echo $this->Html->css('http://fonts.googleapis.com/css?family=Orbitron:400');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>

        <?php echo $this->element('header'); ?>

        <div id="container">
            <div id="content">
            <?php
                if (isset($current_user)) {
                    echo $this->element('navbar-2');
                } else {
                    echo $this->element('navbar-1');
                }
            ?>
            <?php echo $this->Flash->render('auth'); ?>


                <div class="container-fluid">
                    <div class="row">

                        <?php echo $this->Flash->render(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>


            </div>
            <!--<div id="footer">
                <?php /*echo $this->Html->link(
                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                    'http://www.cakephp.org/',
                    array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
                );*/
                ?>
                <p>
                    <?php //echo $cakeVersion; ?>
                </p>
            </div>-->
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>

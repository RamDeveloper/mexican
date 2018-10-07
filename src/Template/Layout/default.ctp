<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Mexicanwave Pharma';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script(['jquery-3.3.1.min','back_custom','jquery.validate.min']) ?>
</head>
<body>
    <header>
    <div class="logo text-center pt-30 pb-30">
      <?php echo $this->Html->image('logo.png', ['alt' => 'Logo', 'url' => ['controller' => 'Home', 'action' => 'index']]); ?>
    </div>
    </header>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <!-- <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul> -->
        <div class="top-bar-section">
            <ul class="right">
                <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('List Speciality'), ['controller' => 'speciality', 'action' => 'view','1']) ?></li>
                <li><?= $this->Html->link(__('Add Brand'), ['controller' => 'Brand', 'action' => 'add']) ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    <div class="clearfix"></div>
    <br>
    <footer>
        <div class="footer">
            <div class="container text-center mt-30">
                <div class="footer-bottom">
                    <div class="copy-rights">
                        <p>Copyright © Mexican Wave Pharma. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>

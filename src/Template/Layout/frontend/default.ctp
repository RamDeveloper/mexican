<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('chosen/chosen.css') ?>
        <?= $this->Html->css('chosen/style.css') ?>
        <?= $this->Html->meta('favicon.ico', '/img/favicon-32x32.png', ['type' => 'icon']); ?>
    </head>
    <body class="gray-bg">
        <section class="mar-bottom-30 mar-top-30">
            <div class="login-box">
                <header class="header text-center mar-bottom-30">
                    <?= $this->Html->image('logo.png', ['alt' => '', 'url' => ['controller' => 'Home', 'action' => 'index']]); ?>
                </header>
                <div class="white-bg clearfix">
                    <p> <?php echo $this->Flash->render(); ?> </p>
                    <p> <?php echo $this->Flash->render('auth'); ?> </p>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </section>
        <?= $this->Html->script(['jquery-3.3.1.min','custom' ,'bootstrap.min','chosen/chosen.jquery','chosen/init']) ?>
    </body>
</html>
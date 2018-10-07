<?php
/*
 * @created : Ramkumar S  
 * @created on : September,2018 
 */
?>
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
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->css('custom.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('chosen.css') ?>
        <?= $this->Html->css('home.css') ?>
        <?= $this->Html->css('jquery.bxslider.css') ?>
        <?= $this->Html->meta('favicon.ico', '/img/favicon-32x32.png', ['type' => 'icon']); ?>
    </head>
    <body>
        <?= $this->fetch('content') ?>
        <?= $this->Html->script(['jquery-3.3.1.min','custom' ,'bootstrap.min','chosen/chosen.jquery','jquery.bxslider','chosen/init','jquery.validate.min']) ?>
    </body>
</html>
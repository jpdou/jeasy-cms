<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 8:47
 */
/** @var \View\AbstractView $this */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->getSubBlock('head')->toHtml() ?>
</head>
<body>
<div class="page">
    <div class="header">
        <?= $this->getSubBlock('header')->toHtml() ?>
    </div>
    <div class="content-wrapper">
        <div class="content">
            <?= $this->getSubBlock('content')->toHtml() ?>
        </div>
        <div class="sidebar">
            <?= $this->getSubBlock('sidebar')->toHtml() ?>
        </div>
    </div>
    <div class="footer">
        <?= $this->getSubBlock('footer')->toHtml() ?>
    </div>
</div>
</body>
</html>

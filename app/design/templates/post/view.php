<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 8:47
 */
/** @var \View\Post\View $this */
?>
<div class="title">
    <h1><?= $this->getTitle() ?></h1>
    <p><?= $this->getCreatedAt() ?></p>
</div>
<div class="post-content">
    <?= $this->getContent() ?>
</div>
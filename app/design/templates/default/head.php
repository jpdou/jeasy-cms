<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 8:46
 */
/** @var \View\AbstractView $this */
$layout = $this->getLayout();
?>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link rel="icon" type="image/x-icon" href="<?= App::getBaseUrl(). 'media/favicon.ico' ?>" />
<title><?= $layout->getPageData('title') ?></title>
<meta name="keywords" content="<?= $layout->getPageData('keywords') ?>" />
<meta name="tags" content="<?= $layout->getPageData('keywords') ?>" />
<meta name="description" content="<?= $layout->getPageData('description') ?>" />
<meta property="og:type" content="news" />
<meta property="og:title" content="<?= $layout->getPageData('title') ?>" />
<meta property="og:description" content="<?= $layout->getPageData('description') ?>" />
<meta property="og:url" content="<?= $layout->getPageData('url') ?>" />
<!--<meta property="og:image" content="http://n.sinaimg.cn/tech/transform/667/w400h267/20180414/DkK4-fzcyxmu2680974.jpg" />-->

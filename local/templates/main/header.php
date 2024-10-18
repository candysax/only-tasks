<?php

use Bitrix\Main\Page\Asset;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <?php $APPLICATION->ShowHead(); ?>

    <?php Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/common.css') ?>
</head>
<body>
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>
<div id="barba-wrapper">

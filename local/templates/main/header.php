<?php

use Bitrix\Main\Page\Asset;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php $APPLICATION->ShowTitle(); ?></title>

		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

		<?php $APPLICATION->ShowHead(); ?>

        <?php Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">') ?>
	</head>
	<body>
    <div id="panel">
        <?php $APPLICATION->ShowPanel(); ?>
    </div>
    <div class="header-block">
        <div class="container">
            <a href="/" class="logo">
                <div class="img"></div>
                <h1 class="title">
                    <span class="spec">Официальный сайт мэрии</span>
                    <span class="name">Краснорожье</span>
                </h1>
            </a>
            <div class="menu"></div>
        </div>
    </div>
    <div class="container">
        <main class="content-block">



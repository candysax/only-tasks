<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

function formatNewsDate(string $date): string
{
    return FormatDate('j F Y, H:m', MakeTimeStamp($date));
}

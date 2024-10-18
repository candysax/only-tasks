<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

function getAuthorNameByID(int $id): string
{
    try {
        $user = CUser::GetByID($id)->Fetch();
        return "{$user['NAME']} {$user['LAST_NAME']}";
    } catch (\Bitrix\Main\DB\Exception $e) {
        return '';
    }
}

function formatNewsDate(string $date): string
{
    return FormatDate('j F Y, H:m', MakeTimeStamp($date));
}

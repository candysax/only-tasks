<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

if ($arResult["NavPageCount"] > 1)
{
    ?>
    <div class="blog-page-navigation">
        <?
            $bFirst = true;

            if ($arResult["NavPageNomer"] > 1):
                if ($arResult["bSavePage"]):
                    ?>
                    <a class="item blog-page-previous" href="<?=$arResult["sUrlPath"] ?>?<?=$strNavQueryString ?>PAGEN_<?=$arResult["NavNum"] ?>=<?=($arResult["NavPageNomer"] - 1) ?>">
                        <
                    </a>
                <?
                else:
                    if ($arResult["NavPageNomer"] > 2):
                        ?>
                        <a class="item blog-page-previous" href="<?=$arResult["sUrlPath"] ?>?<?=$strNavQueryString ?>PAGEN_<?=$arResult["NavNum"] ?>=<?=($arResult["NavPageNomer"] - 1) ?>"
                            <
                        </a>
                    <?
                    else:
                        ?>
                        <a class="item blog-page-previous" href="<?=$arResult["sUrlPath"] ?><?=$strNavQueryStringFull ?>">
                            <
                        </a>
                    <?
                    endif;

                endif;

                if ($arResult["nStartPage"] > 1):
                    $bFirst = false;
                    if ($arResult["bSavePage"]):
                        ?>
                        <a class="item blog-page-first" href="<?=$arResult["sUrlPath"] ?>?<?=$strNavQueryString ?>PAGEN_<?=$arResult["NavNum"] ?>=1">1</a>
                    <?
                    else:
                        ?>
                        <a class="item blog-page-first" href="<?=$arResult["sUrlPath"] ?><?=$strNavQueryStringFull ?>">1</a>
                    <?
                    endif;
                    ?>
                    <?
                    if ($arResult["nStartPage"] > 2):
                        ?>
                        <span class="item blog-page-dots">...</span>
                    <?
                    endif;
                endif;
            endif;

            do
            {
                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <span class="item <?=($bFirst ? "blog-page-first " : "") ?>blog-page-current"><?=$arResult["nStartPage"] ?></span>
                <?
                elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                    ?>
                    <a href="<?=$arResult["sUrlPath"] ?><?=$strNavQueryStringFull ?>" class="item <?=($bFirst ? "blog-page-first" : "") ?>"><?=$arResult["nStartPage"] ?></a>
                <?
                else:
                    ?>
                    <a href="<?=$arResult["sUrlPath"] ?>?<?=$strNavQueryString ?>PAGEN_<?=$arResult["NavNum"] ?>=<?=$arResult["nStartPage"] ?>"<?
                    ?> class="item <?=($bFirst ? "blog-page-first" : "") ?>"><?=$arResult["nStartPage"] ?></a>
                <?
                endif;
                ?>
                <?
                $arResult["nStartPage"]++;
                $bFirst = false;
            }
            while ($arResult["nStartPage"] <= $arResult["nEndPage"]);

            if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                    if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                        ?>
                        <span class="item blog-page-dots">...</span>
                    <?
                    endif;
                    ?>
                    <a class="item" href="<?=$arResult["sUrlPath"] ?>?<?=$strNavQueryString ?>PAGEN_<?=$arResult["NavNum"] ?>=<?=$arResult["NavPageCount"] ?>"><?=$arResult["NavPageCount"] ?></a>
                <?
                endif;
                ?>
                <a class="item blog-page-next" href="<?=$arResult["sUrlPath"] ?>?<?=$strNavQueryString ?>PAGEN_<?=$arResult["NavNum"] ?>=<?=($arResult["NavPageNomer"] + 1) ?>">
                    >
                </a>
            <?
            endif;
        ?>
    </div>
    <?
}
?>

<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/helpers.php';
?>

<?php if (!empty($arResult['ITEMS'])) : ?>
    <div class="news-list">
        <h2 class="title"><?= $arResult['NAME'] ?? '' ?></h2>
        <div class="items">
            <?php foreach ($arResult['ITEMS'] as $arItem) : ?>
                <?php
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>

                <a href="#" class="news-item" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                    <div class="preview">
                        <?php if (isset($arItem['DISPLAY_PROPERTIES']['CATEGORY'])) : ?>
                            <div class="category"><?= $arItem['DISPLAY_PROPERTIES']['CATEGORY']['DISPLAY_VALUE'] ?></div>
                        <?php endif; ?>
                        <?php if ($arParams["DISPLAY_PICTURE"] != "N" && isset($arItem['PREVIEW_PICTURE']['SRC'])) : ?>
                            <img
                                class="image"
                                src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                                alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"
                            >
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <h3 class="title"><?= $arItem['NAME'] ?? '' ?></h3>
                        <div class="meta">
                            <span class="date">
                                <?= (!empty($arItem['ACTIVE_FROM']))
                                    ? formatNewsDate($arItem['ACTIVE_FROM'])
                                    : formatNewsDate($arItem['DATE_CREATE'])
                                ?>
                            </span>
                            <span class="author">
                                <?= getAuthorNameByID($arItem['DISPLAY_PROPERTIES']['AUTHOR']['VALUE']) ?>
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
<?php endif; ?>

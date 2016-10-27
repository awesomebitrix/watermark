<?php
$arWaterMark = Array(
    array(
        "name" => "watermark",
        "position" => "center",
        "type" => "image",
        "size" => "real",
        "file" => $_SERVER["DOCUMENT_ROOT"]."/images/Vatermark.gif",
        "fill" => "exact",
    )

);
if (is_array($arResult['MORE_PHOTO']) && count($arResult['MORE_PHOTO']) > 0)
{
    unset($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']);

    foreach ($arResult['MORE_PHOTO'] as $key => $arFile)
    {
        $arResizeFile = CFile::ResizeImageGet(
            $arFile["ID"],
            array(),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true,
            $arWaterMark
        );

        $arResult['MORE_PHOTO'][$key] = $arResizeFile;
        $arResult['MORE_PHOTO'][$key]['MORE_PHOTO_REAL'] = $arFile;
    }
}
?>

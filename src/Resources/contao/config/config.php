<?php

use Contao\FilesModel;
use Contao\StringUtil;

$GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoctaattheside/cta-at-the-side.scss|static';

function generateHTML($cta_image, $cta_text, $cta_link)
{
    $html_strukutur = '';
    $html_strukutur .= '<div class="link_wrapper"><div class="inside"><a href="' . $cta_link . '">';

    $imgTag = generateImageTag($cta_image);
    if ($imgTag) {
        $html_strukutur .= $imgTag;
    }

    if ($cta_text) {
        $html_strukutur .= '<p>' . $cta_text . '</p>';
    }

    $html_strukutur .= '</a></div></div>';

    return $html_strukutur;
}

function generateImageTag($cta_image)
{
    if ($cta_image) {
        $file = FilesModel::findByUuid($cta_image);
        if ($file === null) {
            return '';
        }

        $src = StringUtil::specialchars($file->path);

        // Take alt text ONLY from file meta data (language-aware); otherwise keep alt=""
        $meta = StringUtil::deserialize($file->meta, true);
        $lang = $GLOBALS['TL_LANGUAGE'] ?? 'en';

        $alt = '';
        if (is_array($meta) && isset($meta[$lang]) && is_array($meta[$lang]) && array_key_exists('alt', $meta[$lang])) {
            $alt = trim((string) $meta[$lang]['alt']);
        }

        return '<img src="' . $src . '" alt="' . StringUtil::specialchars($alt) . '">';
    }

    return '';
}

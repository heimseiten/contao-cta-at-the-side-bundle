<?php

use Contao\FilesModel;
use Contao\StringUtil;

$GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoctaattheside/cta-at-the-side.scss|static';

function generateHTML($cta_image, $cta_text, $cta_link)
{
    $html_strukutur = '';
    $html_strukutur .= '<div class="link_wrapper"><div class="inside"><a href="' . StringUtil::specialchars($cta_link) . '">';

    $imgTag = generateImageTag($cta_image);
    if ($imgTag) {
        $html_strukutur .= $imgTag;
    }

    if ($cta_text) {
        $html_strukutur .= '<p>' . StringUtil::specialchars($cta_text) . '</p>';
    }

    $html_strukutur .= '</a></div></div>';

    return $html_strukutur;
}

function generateImageTag($cta_image)
{
    if (!$cta_image) {
        return '';
    }

    $file = FilesModel::findByUuid($cta_image);
    if ($file === null) {
        return '';
    }

    $src = StringUtil::specialchars($file->path);

    $meta = StringUtil::deserialize($file->meta, true);

    $lang = $GLOBALS['TL_LANGUAGE'] ?? 'en';

    $langNorm = str_replace('-', '_', $lang);
    $root     = substr($langNorm, 0, 2);

    $candidates = array_unique([$lang, $langNorm, $root]);

    $alt = '';

    if (is_array($meta)) {
        foreach ($candidates as $cand) {
            if (isset($meta[$cand]) && is_array($meta[$cand]) && array_key_exists('alt', $meta[$cand])) {
                $alt = trim((string) $meta[$cand]['alt']);
                if ($alt !== '') {
                    break;
                }
            }
        }
    }

    return '<img src="' . $src . '" alt="' . StringUtil::specialchars($alt) . '">';
}

<?php

if (TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaoctaattheside/cta-at-the-side.scss|static';
}

function generateHTML($cta_image, $cta_text, $cta_link)
{
    $html_strukutur .= '<a href="' . $cta_link . '">';
    
    if (generateImageTag($cta_image)) { $html_strukutur .= generateImageTag($cta_image); }
    if ($cta_text) { $html_strukutur .= '<p>' . $cta_text . '</p>'; }
    
    $html_strukutur .= '</a>';

    return $html_strukutur;
}

function generateImageTag($cta_image) 
{
    if ($cta_image) 
    { 
        return '<img src="' . \FilesModel::findByUuid($cta_image)->path . '">'; 
    }
}

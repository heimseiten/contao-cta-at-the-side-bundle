<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCtaAtTheSideBundle\Listener;

use Contao\PageModel;

class HooksListener
{
    public function onOutputFrontendTemplate(string $buffer, string $templateName): string
    {
        return $this->processBuffer($buffer,$templateName);
    }

    private function processBuffer(string $buffer, $templateName): string
    {
        if (TL_MODE == 'FE' && 'fe_page' === $templateName) 
        {
            global $objPage;

            $html_strukutur = '';
            $rootPage = PageModel::findById($GLOBALS['objPage']->rootId);
            if ($rootPage->cta_position) {
                if ($rootPage->cta_1_link) { $html_strukutur .= generateHTML($rootPage->cta_1, $rootPage->cta_1_text, $rootPage->cta_1_link); }
                if ($rootPage->cta_2_link) { $html_strukutur .= generateHTML($rootPage->cta_2, $rootPage->cta_2_text, $rootPage->cta_2_link); }
                if ($rootPage->cta_3_link) { $html_strukutur .= generateHTML($rootPage->cta_3, $rootPage->cta_3_text, $rootPage->cta_3_link); }
                if ($rootPage->cta_4_link) { $html_strukutur .= generateHTML($rootPage->cta_4, $rootPage->cta_4_text, $rootPage->cta_4_link); }
            }
            if ($html_strukutur) { $html_strukutur = '<div class="cta_wrapper"><div class="inside ' . $rootPage->cta_position . '">' . $html_strukutur . '</div></div>'; }

            $buffer = preg_replace('/<div id="wrapper">/', '<div id="wrapper">' . $html_strukutur, $buffer, 1);   
        }
        return $buffer;   
    }
}
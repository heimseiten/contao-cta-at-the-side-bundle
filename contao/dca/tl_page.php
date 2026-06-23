<?php

use Contao\Config;
use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend('cta_legend', 'title_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('cta_position','cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_1','cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_1_link', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_1_text','cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_2', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_2_link', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_2_text', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_3', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_3_link', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_3_text', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_4', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_4_link', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('cta_4_text', 'cta_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('root', 'tl_page') 
    ->applyToPalette('rootfallback', 'tl_page') 
;

$GLOBALS['TL_DCA']['tl_page']['fields'] += [    
    'cta_position' => [
        'inputType' => 'select',
        'eval'      => array('tl_class'=>'w50 clr'),
        'options'   => array('', 'left', 'right'),
        'reference' => &$GLOBALS['TL_LANG']['cta_position'], 
        'sql'       => "varchar(255) NOT NULL default ''"
    ],
    'cta_1' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'inputType' => 'fileTree',
        'eval' => array( 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => Config::get('validImageTypes'), 'tl_class' => 'w50 clr' ),
        'sql' => "blob NULL"
    ],
    'cta_2' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'inputType' => 'fileTree',
        'eval' => array( 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => Config::get('validImageTypes'), 'tl_class' => 'w50 clr' ),
        'sql' => "blob NULL"
    ],   
    'cta_3' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'inputType' => 'fileTree',
        'eval' => array( 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => Config::get('validImageTypes'), 'tl_class' => 'w50 clr' ),
        'sql' => "blob NULL"
    ],
    'cta_4' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'inputType' => 'fileTree',
        'eval' => array( 'fieldType' => 'radio', 'filesOnly' => true, 'extensions' => Config::get('validImageTypes'), 'tl_class' => 'w50 clr' ),
        'sql' => "blob NULL"
    ],

    'cta_1_text' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'clr' ),
        'inputType' => 'text', 
        'sql'       => "text NULL" 
    ],
    'cta_2_text' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'clr' ),
        'inputType' => 'text', 
        'sql'       => "text NULL" 
    ],
    'cta_3_text' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'clr' ),
        'inputType' => 'text', 
        'sql'       => "text NULL" 
    ],
    'cta_4_text' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'clr' ),
        'inputType' => 'text', 
        'sql'       => "text NULL" 
    ],

    'cta_1_link' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'w50' ),
        'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
    ],
    'cta_2_link' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'w50' ),
        'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
    ],
    'cta_3_link' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'w50' ),
        'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
    ],
    'cta_4_link' => [
        'reference' => &$GLOBALS['TL_LANG']['tl_page'],
        'eval' => array( 'tl_class' => 'w50' ),
        'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
    ],
    
];

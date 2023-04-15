<?php
/**
 * Options of the KaTeX Plugin
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author  H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

// CDN Provider
$meta['cdn-provider'] = array( 'multichoice', '_choices' => array( 'self-hosted', 'bootcdn', 'cdnjs', 'unpkg', 'jsdelivr', 'jshub', 'staticfile' ) );

// KaTeX Extentions
$meta['extension-copy-tex'] = array( 'onoff' );
$meta['extension-mhchem']   = array( 'onoff' );

// Rendering Options
$meta['option-output']          = array( 'multichoice', '_choices' => array( 'html', 'mathml', 'htmlAndMathml' ) );
$meta['option-delimiters']      = array( '' );
$meta['option-ignored-tags']    = array( 'string' );
$meta['option-ignored-classes'] = array( 'string' );
$meta['option-throwonerror']    = array( 'onoff' );
$meta['option-error-color']     = array( 'string' );
$meta['option-macros']          = array( '' );

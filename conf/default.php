<?php
/**
 * Default Values for Options of the KaTeX Plugin
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author  H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

$conf['cdn-provider']       = 'self-hosted';
$conf['extension-copy-tex'] = 1;
$conf['extension-mhchem']   = 1;
$conf['option-output']      = 'htmlAndMathml';
$conf['option-delimiters']  = '
{ "left": "$$", "right": "$$", "display": true }
{ "left": "$", "right": "$", "display": false }
{ "left": "\\(", "right": "\\)", "display": false }
{ "left": "\\[", "right": "\\]", "display": true }';
$conf['option-ignored-tags']    = 'script, noscript, style, textarea, pre, code, option';
$conf['option-ignored-classes'] = '';
$conf['option-throwonerror']    = 1;
$conf['option-error-color']     = '#CC0000';
$conf['option-macros']          = '
{ "command": "\\NN", "expansion": "\\mathbb{N}" }
{ "command": "\\ZZ", "expansion": "\\mathbb{Z}" }
{ "command": "\\QQ", "expansion": "\\mathbb{Q}" }
{ "command": "\\RR", "expansion": "\\mathbb{R}" }
{ "command": "\\CC", "expansion": "\\mathbb{C}" }';

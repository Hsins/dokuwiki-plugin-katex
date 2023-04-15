<?php
/**
 * English (en) Settings Language File for KaTeX Plugin
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

// CDN Provider
$lang['cdn-provider']               = 'Select the CDN (Content Delivery Network) service provider for hosting KaTeX files.';
$lang['cdn-provider_o_self-hosted'] = 'Self-hosted without using CDN service';
$lang['cdn-provider_o_bootcdn']     = 'BootCDN';
$lang['cdn-provider_o_cdnjs']       = 'cdnjs';
$lang['cdn-provider_o_unpkg']       = 'UNPKG';
$lang['cdn-provider_o_jsdelivr']    = 'jsDelivr';
$lang['cdn-provider_o_jshub']       = 'jsHub';
$lang['cdn-provider_o_staticfile']  = 'Staticfile CDN';

// KaTeX Extensions
$lang['extension-copy-tex'] = 'Enable the "copy-tex" extension (When selecting and copying KaTeX-rendered elements, copies their LaTeX source to the clipboard).';
$lang['extension-mhchem']   = 'Enable the "mhchem" extension (Write beautiful chemical equations easily)';

// Rendering Options
$lang['option-displaymode']     = 'Render expressions in Display Mode. The Display Mode starts in <code>\displaystyle</code>, so <code>\int</code> and <code>\sum</code> are large for example.';
$lang['option-output']          = 'The markup language of the rendering output.';
$lang['option-delimiters']      = 'List of delimiters to look for expressions, processed in the same order as the list.';
$lang['option-ignored-tags']    = 'List of types of DOM node to ignore when recursing through.';
$lang['option-ignored-classes'] = 'List of class names of DOM node to ignore when recursing through.';
$lang['option-throwonerror']    = 'Throw a <code>ParseError</code> when it encounters an unsupported command or invalid LaTeX syntax; Else, KaTeX will render unsupported commands as text by given color.';
$lang['option-error-color']     = 'The color that unsupported commands and invalid LaTeX syntax are rendered in when "throwonerror" is set to <code>false</code>.';
$lang['option-macros']          = 'Collection of custom macros. Each macro maps a command to given expansion.';

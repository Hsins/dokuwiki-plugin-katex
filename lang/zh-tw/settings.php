<?php
/**
 * Traditional Chinese (zh-tw) Settings Language File for KaTeX Plugin
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

// CDN Provider
$lang['cdn-provider']               = '選擇託管 KaTeX 檔案的內容傳遞網路（CDN, Content Delivery Network）服務商。';
$lang['cdn-provider_o_self-hosted'] = '託管於主機，不使用 CDN 服務';
$lang['cdn-provider_o_bootcdn']     = 'BootCDN';
$lang['cdn-provider_o_cdnjs']       = 'cdnjs';
$lang['cdn-provider_o_unpkg']       = 'UNPKG';
$lang['cdn-provider_o_jsdelivr']    = 'jsDelivr';
$lang['cdn-provider_o_jshub']       = 'jsHub';
$lang['cdn-provider_o_staticfile']  = 'Staticfile CDN';

// KaTeX Extension
$lang['extension-copy-tex'] = '啟用擴充功能 "copy-tex" （選取並複製 KaTeX 渲染後的元素時，複製 LaTeX 原始語法到剪貼簿中）';
$lang['extension-mhchem']   = '啟用擴充功能 "mhchem" （更為容易地撰寫化學方程式）';

// Rendering Options
$lang['option-displaymode']     = '以展示模式（Display Mode）渲染表達式，展示模式以 <code>\displaystyle</code> 開頭，如 <code>\int</code> 與 <code>\sum</code> 的渲染結果會較大。';
$lang['option-output']          = '渲染時輸出的標記語言。';
$lang['option-delimiters']      = '用於查找表達式的分隔符號列表，依列表相同的順序處理。';
$lang['option-ignored-tags']    = '遞迴時要忽略的 DOM 節點標籤列表。';
$lang['option-ignored-classes'] = '遞迴時要忽略的 DOM 節點類別名稱列表。';
$lang['option-throwonerror']    = '當遇到不支援的命令或無效的 LaTeX 語法時拋出 <code>ParseError</code>；否則，KaTeX 會將不支援的語法以指定的錯誤顏色渲染成文字。';
$lang['option-error-color']     = '當 "throwonerror" 設置為「否」（未勾選）時，呈現不支援的命令和無效的 LaTeX 語法的顏色。';
$lang['option-macros']          = '自定義巨集的集合，每個巨集將命令（command）映射到對應的展開（expansion）。';

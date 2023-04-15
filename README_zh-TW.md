<!-- badges -->
<div align="right">

  [![](https://img.shields.io/github/license/Hsins/dokuwiki-plugin-katex.svg?label=License&style=flat-square)](./LICENSE)

</div>

<!-- logo, title and description -->
<div align="center">

  <img src="https://user-images.githubusercontent.com/26391143/232326068-ec1fda94-89a1-4de3-b092-98e360869bad.png" alt="DokuWiki Plugin: KaTeX" height="150px" />

# DokuWiki Plugin: KaTeX

🧩 _一款用於解析_ $\TeX{}$ _表達式，並使用 [KaTeX](https://katex.org/) 及 [mhchem](https://mhchem.github.io/MathJax-mhchem/) 於頁面中渲染數學／化學方程式的 DokuWiki 外掛。_

[![Plugin Page](https://img.shields.io/badge/外掛主頁--f5edcc.svg?logo=read-the-docs&style=flat-square)](https://www.dokuwiki.org/plugin:katex)
[![](https://img.shields.io/badge/更新日誌--E08B32.svg?logo=git&style=flat-square)](./CHANGELOG_zh-TW.md)

</div>

## 安裝說明

安裝外掛到您 DokuWiki 站點的方式，大致上有三種：

- **方法一** — 使用 [DokuWiki 外掛管理工具](https://www.dokuwiki.org/plugin:extension) 搜尋並安裝外掛
- **方法二** — 下載外掛程式並解壓縮到伺服器上的 `<DOKUWIKI_DIR>/lib/plugins/katex` 目錄
- **方法三** — 透過 [DokuWiki 命令行工具](https://www.dokuwiki.org/plugin:cli) 安裝並維護外掛

使用 DokuWiki 命令行工具的範例如下：

``` bash
# 透過 Git 安裝 KaTeX 外掛
$ ./bin/gittool.php clone katex

# 與 clone 命令相同，但當找不到 git 來源時下載檔案安裝
$ ./bin/gittool.php install katex
```

## 設定與選項

### 資源託管

您可以選擇將 KaTeX 資源檔案託管於主機上，或是選擇下列其中一個內容交付網路提供商（Content Delivery Network, CDN）：

|                   選項                    | 說明                                                                                                                                   |
| :---------------------------------------: | :------------------------------------------------------------------------------------------------------------------------------------- |
|                 自行託管                  | 在您自己的 DokuWiki 站點上託管資源檔案，文件將包含於 DokuWiki 的 KaTeX 外掛中。                                                        |
|    [BootCDN](https://www.bootcdn.cn/)     | BootCDN 是由 [Bootstrap 中文網](https://www.bootcss.com/) 維護，託管於 [極兔雲](https://www.jitucdn.com/) 的免費 CDN 服務。            |
|        [cdnjs](https://cdnjs.com/)        | cdnjs 是有超過 12.5% 以上的網站在使用的開源免費 CDN 服務，由 Cloudflare 提供支援。                                                     |
|      [UNPKG](https://www.unpkg.com/)      | UNPKG 在全球提供 npm 倉庫的快速的 CDN 服務，由 Cloudflare 提供支援。                                                                   |
|   [jsDelivr](https://www.jsdelivr.com/)   | JsDelivr 為開源專案文件提供免費的 CDN 服務；該服務沒有頻寬限制或進階付費功能，任何人都可以完全免費使用。                               |
|        [jsHub](https://jshub.com/)        | jsHub 是一個開源專案，致力於提供穩定且快速的 CDN 服務，其中收錄的開源專案與 [cdnjs](https://github.com/cdnjs/cdnjs) 專案倉庫保持同步。 |
| [Staticfile CDN](https://staticfile.org/) | Staticfile CDN 在中國提供穩定且快速的 CDN 服務，由 [七牛雲](http://qiniu.com/) 和 [掘金社區](https://juejin.cn/) 提供技術支援。        |

> **Note** DokuWiki KaTeX 外掛程式中，含有自 KaTeX [發佈頁面](https://github.com/KaTeX/KaTeX/releases) 所下載的最新版本資源檔案。

### 擴充功能

DokuWiki KaTeX 外掛支援了部分由 KaTeX 提供的 [擴充功能](https://katex.org/docs/libs.html)，用以提升使用者體驗或增添額外的功能：

|       設定選項       | 說明                                                                           |
| :------------------: | :----------------------------------------------------------------------------- |
| `extension-copy-tex` | 啟用後，在選取並複製經 KaTeX 渲染後的元素時，會複製原始的 TeX 表達式到剪貼簿中 |
|  `extension-mhchem`  | 啟用後，可以更為容易地撰寫化學方程式                                           |

您可以在您 DokuWiki 站點的系統設定頁面中，選擇啟用或禁用這些擴充功能。

### 渲染選項

DokuWiki KaTeX 外掛允許您自訂部分 KaTeX 渲染時的 [設定選項](https://katex.org/docs/options.html)：

|         設定選項         | 說明                                                                                                                    |
| :----------------------: | :---------------------------------------------------------------------------------------------------------------------- |
|     `option-output`      | 渲染時輸出的標記語言。                                                                                                  |
|   `option-delimiters`    | 用於查找表達式的分隔符號列表，依列表相同的順序處理。                                                                    |
|  `option-ignored-tags`   | 遞迴時要忽略的 DOM 節點標籤列表。                                                                                       |
| `option-ignored-classes` | 遞迴時要忽略的 DOM 節點類別名稱列表。                                                                                   |
|  `option-throwonerror`   | 當遇到不支援的命令或無效的 $\LaTeX{}$ 語法時拋出 `ParseError`；否則，KaTeX 會將不支援的語法以指定的錯誤顏色渲染成文字。 |
|   `option-error-color`   | 當 `throwonerror` 設置為「否」（未勾選）時，呈現不支援的命令和無效的 $\LaTeX{}$ 語法的顏色。                            |
|     `option-macros`      | 自定義巨集的集合，每個巨集將命令（command）映射到對應的展開（expansion）。                                              |

#### 設定選項：`option-output`

- `HTML` 選項只將 KaTeX 表達式輸出為 HTML 標籤。
- `MathML` 選項只將 KaTeX 表達式輸出為 MathML 標籤。
- `HTML and MathML` 選項同時將 KaTeX 表達式輸出為 HTML 與 MathML 標籤，前者用於視覺顯示，後者提高訪問性。

#### 設定選項：`option-delimiters`

**範例**

``` plain
{ "left": "$$", "right": "$$", "display": true }
{ "left": "$", "right": "$", "display": false }
{ "left": "\\(", "right": "\\)", "display": false }
{ "left": "\\[", "right": "\\]", "display": true }
```

**說明**

- 每一行只能有一個 delimiter 並且行尾不需要加上逗號。
- 每一個 delimiter 應該含有三種屬性：
  - `left`: 內容為 **string** 型別，標示為數學表達式的起始分界符號。
  - `right`: 內容為 **string** 型別，標示為數學表達式的結束分界符號。
  - `display`: 內容為 **boolean** 型別，用以表示是否將數學表達式以展示模式（Display Mode）顯示。
- 每一個 delimiter 應該滿足 [JSON](http://www.json.org/) 格式，其中在表達字串型別時，須以雙引號包圍字串而非使用單引號包圍字串。
- 順序會影響渲染時的解析順序。

#### 設定選項：`option-ignored-tags`

**範例**

``` plain
script, noscript, style, textarea, pre, code, option
```

**說明**

- 以逗號分隔標籤。

#### 設定選項：`option-ignored-classes`

**範例**

``` plain
code-mirror, annotation-box
```

**說明**

- 以逗號分隔類別名稱。

#### 設定選項：`option-error-color`

**範例**

``` plain
#CCDDFF
#719
```

**說明**

- 用以表示色彩數值的字串，應以 HEX3（`#XXX`）或 HEX6（`#XXXXXX`）格式表達。

#### 設定選項：`option-macros`

**範例**

``` plain
{ "command": "\\NN", "expansion": "\\mathbb{N}" }
{ "command": "\\ZZ", "expansion": "\\mathbb{Z}" }
{ "command": "\\QQ", "expansion": "\\mathbb{Q}" }
{ "command": "\\RR", "expansion": "\\mathbb{R}" }
{ "command": "\\CC", "expansion": "\\mathbb{C}" }
```

**說明**

- 每一行只能有一個 macro 並且行尾不需要加上逗號。
- 每一個 macro 應該含有兩種屬性：
  - `command`: 內容為 **string** 型別，標示為映射巨集展開時的名稱。
  - `expansion`: 內容為 **string** 型別，用以表示對應的巨集展開內容。
- 每一個 macro 應該滿足 [JSON](http://www.json.org/) 格式，其中在表達字串型別時，須以雙引號包圍字串而非使用單引號包圍字串。

## 截圖與演示

### 螢幕截圖

<table>
<tr>
  <th> 頁面渲染 </th>
  <th> 外掛設定 </th>
</tr>
<tr>
<td align="center">

![image](https://user-images.githubusercontent.com/26391143/232169170-80e367da-a854-473e-a017-1dc50b5ea1d8.png)
  
</td>
<td align="center">

![image](https://user-images.githubusercontent.com/26391143/232169642-e2c2e4e4-653c-4d98-8515-31cd41e250c8.png)

</td>
</tr>

</table>

### 演示站點

以下這些 DokuWiki 站點都使用了 KaTeX 外掛：

> **Note** 如果您在自己的 DokuWiki 站點上使用了 KaTeX 外掛，歡迎將您的站點添加到上述列表 😊。

## 貢獻須知

本專案感謝以下開發人員的貢獻：

<a href="https://github.com/Hsins/dokuwiki-plugin-katex/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Hsins/dokuwiki-plugin-katex" />
</a>

## 授權許可

Licensed under the GPL-3.0 License, Copyright © 2023-present **H.-H. PENG (Hsins)**.

<div align="center">
  <sub>Assembled with ❤️ in Taiwan.</sub>
</div>
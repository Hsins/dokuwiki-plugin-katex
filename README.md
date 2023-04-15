<!-- badges -->
<div align="right">

  [![](https://img.shields.io/github/license/Hsins/dokuwiki-plugin-katex.svg?label=License&style=flat-square)](./LICENSE)

</div>

<!-- logo, title and description -->
<div align="center">

  <img src="https://user-images.githubusercontent.com/26391143/232326068-ec1fda94-89a1-4de3-b092-98e360869bad.png" alt="DokuWiki Plugin: KaTeX" height="150px" />

# DokuWiki Plugin: KaTeX

🧩 _DokuWiki plugin for parsing_ $\TeX{}$ _expressions and rendering them into math/chemical equations with [KaTeX](https://katex.org/) and [mhchem](https://mhchem.github.io/MathJax-mhchem/)._

[![Plugin Page](https://img.shields.io/badge/PLUGIN%20PAGE--f5edcc.svg?logo=read-the-docs&style=flat-square)](https://www.dokuwiki.org/plugin:katex)
[![](https://img.shields.io/badge/CHANGELOG--E08B32.svg?logo=git&style=flat-square)](./CHANGELOG.md)

</div>

## Installation

There're roughly different 3 methods to install an extension on your DokuWiki instance:

- **Method 01** — Search and install the plugin using the [Extension Manager](https://www.dokuwiki.org/plugin:extension).
- **Method 02** — Download the extension and unpack it into `<DOKUWIKI_DIR>/lib/plugins/katex` on your server.
- **Method 03** — Maintain and install with [DokuWiki Command Line Tools](https://www.dokuwiki.org/plugin:cli).

Example of installing with DokuWiki Command Line Tools:

``` bash
# Install KaTeX plugin via Git.
$ ./bin/gittool.php clone katex

# The same as clone, but install via download when no git source can be found.
$ ./bin/gittool.php install katex
```

## Configuration and Settings

### Resources Hosting

You can choose to host KaTeX resource files on your server or deliver them by one of the following CDN (Content Delivery Network) providers:

|                  Options                  | Description                                                                                                                                                                                     |
| :---------------------------------------: | :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|                Self-hosted                | Host the minified files on your own DokuWiki instance. Files will contained with the KaTeX plugin for Dokuwiki.                                                                                 |
|    [BootCDN](https://www.bootcdn.cn/)     | BootCDN is the free CDN service maintained by [Bootstrap China](https://www.bootcss.com/) and hosted by [Jitu Cloud](https://www.jitucdn.com/).                                                 |
|        [cdnjs](https://cdnjs.com/)        | cdnjs is a free and open-source CDN service trusted and used by over 12.5% of all websites, powered by Cloudflare.                                                                              |
|      [UNPKG](https://www.unpkg.com/)      | UNPKG is a fast, global CDN service for everything on npm, powered by Cloudflare.                                                                                                               |
|   [jsDelivr](https://www.jsdelivr.com/)   | JsDelivr is a free CDN service for open source files. There're no bandwidth limits or premium features and it's completely free to use by anybody.                                              |
|        [jsHub](https://jshub.com/)        | jsHub is an open source project dedicated to for providing stable, fast and free CDN service. The packages are mainly synchronized with the [cdnjs](https://github.com/cdnjs/cdnjs) repository. |
| [Staticfile CDN](https://staticfile.org/) | Staticfile CDN provide stable and fast CDN service in China. Powered by [Quniu Cloud](http://qiniu.com/) and supported by [Juejin Community](https://juejin.cn/).                               |

> **Note** The KaTeX plugin for DokuWiki contain the latest version of KaTeX from its [release page](https://github.com/KaTeX/KaTeX/releases).

### Extensions

The KaTeX plugin for DokuWiki supports some of the [extensions](https://katex.org/docs/libs.html) provided by KaTeX for improving user experiences and additional functions:

|    Configuration     | Explanation                                                                                                    |
| :------------------: | :------------------------------------------------------------------------------------------------------------- |
| `extension-copy-tex` | If enabled, when selecting and copying KaTeX-rendered elements, copies their TeX expressions to the clipboard. |
|  `extension-mhchem`  | If enabled, you can write beautiful chemical equations easily.                                                 |

You can enable or disable them from the Configuration Settings page on your DokuWiki site.

### Rendering Options

The KaTeX plugin for DokuWiki allows you to customize some of the rendering [options](https://katex.org/docs/options.html) of KaTeX:

|      Configuration       | Explanation                                                                                                                                                       |
| :----------------------: | :---------------------------------------------------------------------------------------------------------------------------------------------------------------- |
|     `option-output`      | The markup language of the rendering output.                                                                                                                      |
|   `option-delimiters`    | List of delimiters to look for expressions, processed in the same order as the list.                                                                              |
|  `option-ignored-tags`   | List of types of DOM node to ignore when recursing through.                                                                                                       |
| `option-ignored-classes` | List of class names of DOM node to ignore when recursing through.                                                                                                 |
|  `option-throwonerror`   | Throw a `ParseError` when it encounters an unsupported command or invalid $\LaTeX{}$ syntax; Else, KaTeX will render unsupported commands as text by given color. |
|   `option-error-color`   | The color that unsupported commands and invalid $\LaTeX{}$ syntax are rendered in when `throwonerror` is disabled.                                                |
|     `option-macros`      | Collection of custom macros. Each macro maps a command to given expansion.                                                                                        |

#### Configuration: `option-output`

- `HTML` outputs KaTeX in HTML only.
- `MathML` outputs KaTeX in MathML only.
- `HTML and MathML` outputs HTML for visual rendering and includes MathML for accessibility.

#### Configuration: `option-delimiters`

**Example**

``` plain
{ "left": "$$", "right": "$$", "display": true }
{ "left": "$", "right": "$", "display": false }
{ "left": "\(", "right": "\)", "display": false }
{ "left": "\[", "right": "\]", "display": true }
```

**Explanation**

- Each line can only contain one delimiter, and there is no need to add a comma at the end.
- Each delimiter has three properties.
  - `left`: a **string** which starts the math expression (the left delimiter)
  - `right`: a **string** which ends the math expression (the right delimiter)
  - `display`: a **boolean** of whether the math in the expression should be rendered in display mode or not.
- Each delimiter should satisfy the [JSON](http://www.json.org/) format, and double quotes should be used instead of single quotes when representing strings.
- The order of line matters.

#### Configuration: `option-ignored-tags`

**Example**

``` plain
script, noscript, style, textarea, pre, code, option
```

**Explanation**

- Each tag should be separated with comma in one line.

#### Configuration: `option-ignored-classes`

**Exmaple**

``` plain
code-mirror, annotation-box
```

**Explanation**

- Each class should be separated with comma in one line.

#### Configuration: `option-error-color`

**Example**

``` plain
#CCDDFF
#719
```

**Explanation**

- The color string should be given in HEX3 (`#XXX`) or HEX6 (`#XXXXXX`) format.

#### Configuration: `option-macros`

**Example**

``` plain
{ "command": "\NN", "expansion": "\mathbb{N}" }
{ "command": "\ZZ", "expansion": "\mathbb{Z}" }
{ "command": "\QQ", "expansion": "\mathbb{Q}" }
{ "command": "\RR", "expansion": "\mathbb{R}" }
{ "command": "\CC", "expansion": "\mathbb{C}" }
```

**Explanation**

- Each line can only contain one macro, and there is no need to add a comma at the end.
- Each macro has two properties:
  - `command`: a **string** as the name for mapping to the expansion.
  - `expansion`: a **string** that describes the expansion of the macro.
- Each macro should satisfy the [JSON](http://www.json.org/) format, and double quotes should be used instead of single quotes when representing strings.

## Sreenshots and Demo Sites

### Screenshots

<table>
<tr>
  <th> Rendering </th>
  <th> Configuration </th>
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

### Demo Sites

The following DokuWiki sites use the KaTeX plugin:

> **Note** If you're and using KaTeX plugin on your DokuWiki instance, feel free to add it to the list 😊.

## Contribution

This project exists thanks to all the people who contribute:

<a href="https://github.com/Hsins/dokuwiki-plugin-katex/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Hsins/dokuwiki-plugin-katex" />
</a>

## License

Licensed under the GPL-3.0 License, Copyright © 2023-present **H.-H. PENG (Hsins)**.

<div align="center">
  <sub>Assembled with ❤️ in Taiwan.</sub>
</div>
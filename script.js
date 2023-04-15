/**
 * Scripts of the KaTeX Plugin
 *
 * add event listener to render TeX expressions with KaTeX
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author  H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

document.addEventListener('DOMContentLoaded', () => {
  if (JSINFO['ACT'] == 'admin') return;
  renderMathInElement(document.body, {
    output: JSINFO['plugins']['katex']['options']['output'],
    delimiters: JSINFO['plugins']['katex']['options']['delimiters'],
    throwOnError: JSINFO['plugins']['katex']['options']['throwonerror'],
    errorColor: JSINFO['plugins']['katex']['options']['error-color'],
    macros: JSINFO['plugins']['katex']['options']['macros'],
  });
});

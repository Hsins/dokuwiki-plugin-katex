<?php

/**
 * DokuWiki Plugin KaTeX (Action Component: load)
 *
 * load KaTeX CSS/JavaScript files
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author  H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

// must be run within Dokuwiki
if ( !defined( 'DOKU_INC' ) ) {
    die();
}

/**
 * Add scripts via an event handler
 */
class action_plugin_katex_load extends DokuWiki_Action_Plugin
{

    // Registers the handlers with DokuWiki's event controller
    public function register( Doku_Event_Handler $controller )
    {
        $controller->register_hook( 'TPL_METAHEADER_OUTPUT', 'BEFORE', $this, 'load_styles' );
        $controller->register_hook( 'TPL_METAHEADER_OUTPUT', 'BEFORE', $this, 'load_scripts' );
    }

    public function load_styles( Doku_Event $event, $param )
    {
        $event->data['link'][] = array(
            'rel'  => 'stylesheet',
            'href' => $this->_get_resource_url( 'katex.min.css' ),
        );
    }

    public function load_scripts( Doku_Event $event, $param )
    {
        $event->data['script'][] = array(
            'defer' => true,
            'src'   => $this->_get_resource_url( 'katex.min.js' ),
        );

        if ( $this->getConf( 'extension-mhchem' ) ) {
            $event->data['script'][] = array(
                'defer' => true,
                'src'   => $this->_get_resource_url( 'contrib/mhchem.min.js' ),
            );
        }

        if ( $this->getConf( 'extension-copy-tex' ) ) {
            $event->data['script'][] = array(
                'defer' => true,
                'src'   => $this->_get_resource_url( 'contrib/copy-tex.min.js' ),
            );
        }

        $event->data['script'][] = array(
            'defer' => true,
            'src'   => $this->_get_resource_url( 'contrib/auto-render.min.js' ),
        );
    }

    private function _get_resource_url( $file_uri )
    {
        $url_templates = array(
            "self-hosted" => DOKU_BASE . 'lib/plugins/katex/_assets/%FILE_URI%',
            // e.g. https://cdn.bootcdn.net/ajax/libs/KaTeX/0.16.4/katex.min.js
            "bootcdn"     => 'https://cdn.bootcdn.net/ajax/libs/KaTeX/%VERSION%/%FILE_URI%',
            // e.g. https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.16.4/katex.min.js
            "cdnjs"       => 'https://cdnjs.cloudflare.com/ajax/libs/KaTeX/%VERSION%/%FILE_URI%',
            // e.g. https://cdn.jsdelivr.net/npm/katex@0.16.4/dist/katex.min.js
            "jsdelivr"    => 'https://cdn.jsdelivr.net/npm/katex@%VERSION%/dist/%FILE_URL%',
            // e.g. https://libs.jshub.com/KaTeX/0.16.4/katex.min.js
            "jshub"       => 'https://libs.jshub.com/KaTeX/%VERSION%/%FILE_URL%',
            // e.g. https://cdn.staticfile.org/KaTeX/0.16.4/katex.min.js
            "staticfile"  => 'https://cdn.staticfile.org/KaTeX/%VERSION%/%FILE_URL%',
            // e.g. https://unpkg.com/katex@0.16.4/dist/katex.min.js
            "unpkg"       => 'https://unpkg.com/katex@%VERSION%/dist/%FILE_URL%',
        );

        $katex_version = '0.16.4';
        $cdn_provider  = $this->getConf( 'cdn-provider' );

        return strtr( $url_templates[$cdn_provider], array( '%VERSION%' => $katex_version, '%FILE_URI%' => $file_uri ) );
    }
}

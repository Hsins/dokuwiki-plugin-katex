<?php

/**
 * DokuWiki Plugin KaTeX (Action Component: setup)
 *
 * handle the data that has to be written into JSINFO, e.g. KaTeX options
 *
 * @license GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @author  H.-H. PENG (Hsins) <hsinspeng@gmail.com>
 */

// must be run within Dokuwiki
if ( !defined( 'DOKU_INC' ) ) {
    die();
}

use dokuwiki\Logger;

class action_plugin_katex_setup extends DokuWiki_Action_Plugin
{
    // Registers the handlers with DokuWiki's event controller
    public function register( Doku_Event_Handler $controller )
    {
        $controller->register_hook( 'DOKUWIKI_STARTED', 'BEFORE', $this, 'setup_options' );
    }

    public function setup_options()
    {
        global $JSINFO;

        $JSINFO['plugins']['katex']['options']['output']          = $this->_get_option_output();
        $JSINFO['plugins']['katex']['options']['delimiters']      = $this->_get_option_delimiters();
        $JSINFO['plugins']['katex']['options']['ignored-tags']    = $this->_get_option_ignored_tags();
        $JSINFO['plugins']['katex']['options']['ignored-classes'] = $this->_get_option_ignored_classes();
        $JSINFO['plugins']['katex']['options']['throwonerror']    = $this->_get_option_throwonerror();
        $JSINFO['plugins']['katex']['options']['error-color']     = $this->_get_option_error_color();
        $JSINFO['plugins']['katex']['options']['macros']          = $this->_get_option_macros();
    }

    private function _get_option_output()
    {
        $conf_option_output  = $this->getConf( 'option-output' );
        $value_option_output = $conf_option_output;

        return $value_option_output;
    }

    private function _get_option_delimiters()
    {
        $DEFAULT_OPTION_DELIMITERS = array(
            array( "left" => "$$", "right" => "$$", "display" => true ),
            array( "left" => "$", "right" => "$", "display" => false ),
            array( "left" => "\\[", "right" => "\\]", "display" => true ),
            array( "left" => "\\(", "right" => "\\)", "display" => false ),
        );
        $conf_option_delimiters = $this->getConf( 'option-delimiters' );

        try {
            $value_option_delimiters = array_map( fn( $line ): array=> json_decode( str_replace( "\\", "\\\\", trim( $line ) ), true ), explode( "\n", trim( $conf_option_delimiters ) ) );
            if ( !$value_option_delimiters ) {
                throw new Exception( 'Parsing Result is null' );
            }
        } catch ( Throwable $e ) {
            $log_title    = '[KaTeX] Invalid Configuration Value ("option-delimiters")';
            $log_messages = "The configuration value shown below is invalid:

            ---
            {$conf_option_delimiters}
            ---

            The value of \"option-delimiters\" option should be mutiple lines of string in '{ \"left\": \"<LEFT_PATTERN>\", \"right\": \"<RIGHT_PATTERN>\", \"display\": \"<BOOLEAN>\" }'.
            KaTeX plugin will fallback to the default value.";
            Logger::error( $log_title, $log_messages, __FILE__, __LINE__ );

            $value_option_delimiters = $DEFAULT_OPTION_DELIMITERS;
        }

        return $value_option_delimiters;
    }

    private function _get_option_ignored_tags()
    {
        $DEFAULT_OPTION_IGNORED_TAGS = array( "script", "noscript", "style", "textarea", "pre", "code", "option" );
        $conf_option_ignored_tags    = $this->getConf( 'option-ignored-tags' );

        try {
            $value_option_ignored_tags = array_map( fn( $text ): string => trim( $text ), explode( ',', $conf_option_ignored_tags ) );
            if ( !$value_option_ignored_tags ) {
                throw new Exception( 'Parsing Result is null' );
            }
        } catch ( Throwable $e ) {
            $log_title    = '[KaTeX] Invalid Configuration Value ("option-ignored-tags")';
            $log_messages = "The configuration value shown below is invalid:

            ---
            {$conf_option_ignored_tags}
            ---

            The value of \"option-ignored-tags\" option should be a string containing tags separated by comma. e.g. \"script, style, textarea, pre, code\"
            KaTeX plugin will fallback to the default value.";
            Logger::error( $log_title, $log_messages, __FILE__, __LINE__ );

            $value_option_ignored_tags = $DEFAULT_OPTION_IGNORED_TAGS;
        }

        return $value_option_ignored_tags;
    }

    private function _get_option_ignored_classes()
    {
        $DEFAULT_OPTION_IGNORED_CLASSES = array( "" );
        $conf_option_ignored_classes    = $this->getConf( 'option-ignored-classes' );

        try {
            $value_option_ignored_classes = array_map( fn( $text ): string => trim( $text ), explode( ',', $conf_option_ignored_classes ) );
            if ( !$value_option_ignored_classes ) {
                throw new Exception( 'Parsing Result is null' );
            }
        } catch ( Throwable $e ) {
            $log_title    = '[KaTeX] Invalid Configuration Value ("option-ignored-tags")';
            $log_messages = "The configuration value shown below is invalid:

            ---
            {$conf_option_ignored_classes}
            ---

            The value of \"option-ignored-classes\" option should be a string containing tags separated by comma. e.g. \"code-mirror, annotation-box\"
            KaTeX plugin will fallback to the default value.";
            Logger::error( $log_title, $log_messages, __FILE__, __LINE__ );

            $value_option_ignored_classes = $DEFAULT_OPTION_IGNORED_CLASSES;
        }

        return $value_option_ignored_classes;
    }

    private function _get_option_throwonerror()
    {
        $conf_option_throwonerror  = $this->getConf( 'option-throwonerror' );
        $value_option_throwonerror = boolval( $conf_option_throwonerror );

        return $value_option_throwonerror;
    }

    private function _get_option_error_color()
    {
        $DEFAULT_OPTION_ERROR_COLOR = '#CC0000';

        $conf_option_error_color  = $this->getConf( 'option-error-color' );
        $value_option_error_color = trim( $conf_option_error_color );

        if ( !preg_match( '/^#(?:[0-9a-fA-F]{3}){1,2}$/i', $value_option_error_color ) ) {
            $log_title    = '[KaTeX] Invalid Configuration Value ("option-error-color")';
            $log_messages = "The configuration value shown below is invalid:

            ---
            {$conf_option_error_color}
            ---

            The value of \"option-error-color\" option should be in HEX3/HEX6 color code format. e.g. \"#04aa6d\" or \"#FFF\"
            KaTeX plugin will fallback to the default value.";
            Logger::error( $log_title, $log_messages, __FILE__, __LINE__ );

            $value_option_error_color = $DEFAULT_OPTION_ERROR_COLOR;
        }

        return $value_option_error_color;
    }

    private function _get_option_macros()
    {
        $DEFAULT_OPTION_MACROS = array(
            "\\NN" => "\\mathbb{N}",
            "\\ZZ" => "\\mathbb{Z}",
            "\\QQ" => "\\mathbb{Q}",
            "\\RR" => "\\mathbb{R}",
            "\\CC" => "\\mathbb{C}",
        );

        $conf_option_macros = $this->getConf( 'option-macros' );

        try {
            $value_option_macros = array_column( array_map( fn( $line ): array=> json_decode( str_replace( "\\", "\\\\", trim( $line ) ), true ), explode( "\n", trim( $conf_option_macros ) ) ), 'expansion', 'command' );
            if ( !$value_option_macros ) {
                throw new Exception( 'Parsing Result is null' );
            }
        } catch ( Throwable $e ) {
            $log_title    = '[KaTeX] Invalid Configuration Value ("option-macros")';
            $log_messages = "The configuration value shown below is invalid:

            ---
            {$conf_option_macros}
            ---

            The value of \"option-macros\" option should be mutiple lines of string in '{ \"command\": \"<COMMAND>\", \"expansion\": \"<EXPANSION>\" }' format.
            KaTeX plugin will fallback to the default value.";
            Logger::error( $log_title, $log_messages, __FILE__, __LINE__ );

            $value_option_macros = $DEFAULT_OPTION_MACROS;
        }

        return $value_option_macros;
    }
}

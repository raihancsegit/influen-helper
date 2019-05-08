<?php

class Influen_Util {

    public static function build_link( $value ) {
        return self::parse_multi_attr( $value, array( 'url' => '', 'title' => '', 'target' => '', 'rel' => '' ) );
    }

    protected static function parse_multi_attr( $value, $default = array() ) {
        $result = $default;
        $params_pairs = explode( '|', $value );
        if ( ! empty( $params_pairs ) ) {
            foreach ( $params_pairs as $pair ) {
                $param = preg_split( '/\:/', $pair );
                if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
                    $result[ $param[0] ] = rawurldecode( $param[1] );
                }
            }
        }

        return $result;
    }

    public static function parse_group_atts( $atts_string ) {
        return json_decode( urldecode( $atts_string ), true );
    }

}

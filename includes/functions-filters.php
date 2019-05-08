<?php
function influen_extend_vc_shortcode() {
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_TB_Content_Block extends WPBakeryShortCodesContainer {
        }
    }

    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_TB_Button extends WPBakeryShortCode {
        }

        class WPBakeryShortCode_TB_Heading extends WPBakeryShortCode {
        }

        class WPBakeryShortCode_TB_Content_Blurb extends WPBakeryShortCode {
        }
    }
}
add_action( 'vc_before_init', 'influen_extend_vc_shortcode' );



function influen_esc_desc2( $translated_string = '', array $placeholdes = array() ) {
    $allowed_tags = array(
        'a' => array(
            'href' => array(),
            'title' => array(),
            'target' => array(),
        ),
        'br' => array(),
        'i' => array(),
        'em' => array(),
        'strong' => array(),
        'code' => array(),
    );

    return wp_kses( vsprintf( $translated_string, $placeholdes ), $allowed_tags );
}


function influen_get_menu_categories() {
    $terms = get_the_terms( get_the_ID(), 'service-category' );
    $cats  = array();

    if ( ! $terms || is_wp_error( $terms ) ) {
        return $cats;
    }

    foreach ( $terms as $term ) {
        $cats[ $term->term_id ] = $term->name;
    }

    return $cats;
}

function influen_is_cat_highlighted( $cats = array(), $cat_id = 0 ) {
    if ( empty( $cats ) || empty( $cat_id ) ) {
        return false;
    }

    return array_key_exists( $cat_id, $cats );
}


function  influen_highlighted_menu_label( &$hcat, $recomended ) {
    if ( isset( $hcat ) && ! empty( $recomended ) ) {
        $label = sprintf( __( '%s | %s', 'cibus' ),
            $hcat,
            $recomended
            );
    } elseif ( isset( $hcat ) && empty( $recomended ) ) {
        $label = $hcat;
    } elseif ( ! isset( $hcat ) && ! empty( $recomended ) ) {
        $label = $recomended;
    }

    return esc_html( $label );
}

if ( ! function_exists( 'cibus_get_menus_categories' ) ) {
    /**
     * Get portfolio categorires to usages on vc & option's map
     * @return string
     */
    function cibus_get_menus_categories($flip = false) {

        $args = array(
            'orderby' => 'name',
            'order'   => 'ASC',
            'fields'  => 'id=>name',
        );
        $out = array();

        $terms = get_terms('service-category', $args);
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            $out = (array) $terms;
        }

        if ($flip) {
            return array_flip($out);
        }
        return $terms;

    }
}

if ( ! function_exists( 'influen_sanitize_param' ) ) {
	/**
	 * Trim and lowercase param value
	 * @param  string $param
	 * @return string
	 */
	function influen_sanitize_param( $param ) {
		return strtolower( trim( $param ) );
	}
}

if ( ! function_exists( 'influen_get_custom_terms_vc' ) ) {
    function influen_get_custom_terms_vc($texonomy){
        global $wpdb;
        $query = 'SELECT DISTINCT
                        t.name,t.term_id,t.slug
                    FROM
                      '.$wpdb->prefix.'terms t
                    INNER JOIN
                      '.$wpdb->prefix.'term_taxonomy tax
                    ON
                      tax.term_id = t.term_id
                    WHERE
                        ( tax.taxonomy = \'' . $texonomy . '\')';
        $categories_obj =  $wpdb->get_results($query , ARRAY_A);
        $cats = array();
        $cats['All'] = '0';
        foreach ($categories_obj as $cat) {
            $cats[$cat['name']] = $cat['term_id'];
        }
        return $cats;
    }
}

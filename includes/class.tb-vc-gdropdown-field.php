<?php

if ( ! class_exists( 'TB_VC_GDropdown_Field' ) ) {

    class TB_VC_GDropdown_Field {

        public function __construct() {
            add_action( 'vc_before_init', array( $this, 'register_vc_gdropdown_field' ) );
        }

        public function prepare_vc_gdropdown_field( $settings, $value ) {


            $html = "<div class='tb_style_gdropdown_field'><select name='%s' class='gdropdown wpb_vc_param_value'>";
            foreach($settings['options'] as $label=>$optiongroup){
                $html .= "<optgroup label='{$label}'>";
                foreach($optiongroup as $label=>$item){
                    if($value==$item){
                        $html .= "<option selected='true' value='{$item}'>{$label}</option>";
                    } else {
                        $html .= "<option value='{$item}'>{$label}</option>";
                    }
                }
                $html .= "</optgroup>";
            }

            $html .= "</select></div>";

            return sprintf( $html,
                esc_attr( $settings['param_name'] )
            );
        }

        public function register_vc_gdropdown_field() {
            vc_add_shortcode_param( 'gdropdown', array( $this, 'prepare_vc_gdropdown_field' ) );
        }

    }

    new TB_VC_GDropdown_Field;
}

if ( ! class_exists( 'TB_VC_Dropdown_Field' ) ) {

   class TB_VC_Dropdown_Field {

    public function __construct() {
            add_action( 'vc_before_init', array( $this, 'gio_dropdown_multi' ) );
        }

    function gio_dropdown_multi_settings_field( $param, $value ) {
       $param_line = '';
       $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
       foreach ( $param['value'] as $text_val => $val ) {
           if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
                        $text_val = $val;
                    }
                    $selected = '';

                    if(!is_array($value)) {
                        $param_value_arr = explode(',',$value);
                    } else {
                        $param_value_arr = $value;
                    }

                    if ($value!=='' && in_array($val, $param_value_arr)) {
                        $selected = ' selected="selected"';
                    }
                    $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
                }
       $param_line .= '</select>';

       return  $param_line;
    }
            public function gio_dropdown_multi(){

                    vc_add_shortcode_param( 'dropdown_multi', array($this,'gio_dropdown_multi_settings_field'));
            }  

    }

    new TB_VC_Dropdown_Field;
}

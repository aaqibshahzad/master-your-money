<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$mymClBtn = mym_sanitize_hex_color( get_option( 'mym_calculate_button_color' ) );
$mymClBtnText = mym_sanitize_hex_color( get_option( 'mym_calculate_button_text_color' ) );
$mymLableColor = mym_sanitize_hex_color( get_option( 'mym_calculator_fields_label_color' ) );

echo '<style id="master-your-money-plugin-style">
.mym-button {
    background-color: ' . esc_attr( $mymClBtn ) . ' !important;
    color: ' . esc_attr( $mymClBtnText ) . ' !important;
    border: 1px solid ' . esc_attr( $mymClBtn ) . ';
}
.mym-button:hover{
    background-color: ' . esc_attr( $mymClBtn ) . ';
    border: 1px solid ' . esc_attr( $mymClBtn ) . ';
}
.mym-button:focus{
    border: 1px solid ' . esc_attr( $mymClBtn ) . ';
}
.mym-form-label {
    color: ' . esc_attr( $mymLableColor ) . ' !important;
}
</style>';
<?php
$mymClBtn = get_option('mym_calculate_button_color');
$mymClBtnText = get_option('mym_calculate_button_text_color');
$mymLableColor = get_option('mym_calculator_fields_label_color');
echo 
'<style id="master-your-money-plugin-style">
.mym-button {
    background-color: '. $mymClBtn .' !important;
    color: '. $mymClBtnText .' !important;
    border:1px solid '. $mymClBtn .';
}
.mym-button:hover{
    background-color: '. $mymClBtn .';
    border:1px solid '. $mymClBtn .';
}
.mym-button:focus{
    border:1px solid '. $mymClBtn .';
}
.mym-form-label {
    color: '. $mymLableColor .' !important;
}
</style>';
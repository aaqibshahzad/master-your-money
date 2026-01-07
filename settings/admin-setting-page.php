<?php

if ( ! defined( 'ABSPATH' ) ) {
    die;
}
?>
<div class="wrap">
    <h1>Master Your Money Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('master_your_money_settings_group');
        ?>
        <table class="form-table" role="presentation">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="mym_hostplus_index_balanced">Graph Hostplus Index Balanced Color</label>
                    </th>
                    <td>
                        <input type="text" id="mym_hostplus_index_balanced" name="mym_hostplus_index_balanced" class="my-color-field" value="<?php echo esc_attr(get_option('mym_hostplus_index_balanced')); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="mym_industry_super_fund_high_growth">Graph Industry Super Fund High Growth Color</label>
                    </th>
                    <td>
                        <input type="text" id="mym_industry_super_fund_high_growth" name="mym_industry_super_fund_high_growth" class="my-color-field" value="<?php echo esc_attr(get_option('mym_industry_super_fund_high_growth')); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="mym_glasshouse_wealth_turbo_growth_fund">Graph Glasshouse Wealth Turbo Growth Fund Color</label>
                    </th>
                    <td>
                        <input type="text" id="mym_glasshouse_wealth_turbo_growth_fund" name="mym_glasshouse_wealth_turbo_growth_fund" class="my-color-field" value="<?php echo esc_attr(get_option('mym_glasshouse_wealth_turbo_growth_fund')); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="mym_calculate_button_color">Calculate Button Color</label>
                    </th>
                    <td>
                        <input type="text" id="mym_calculate_button_color" name="mym_calculate_button_color" class="my-color-field" value="<?php echo esc_attr(get_option('mym_calculate_button_color')); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="mym_calculate_button_text_color">Calculate Button Text Color</label>
                    </th>
                    <td>
                        <input type="text" id="mym_calculate_button_text_color" name="mym_calculate_button_text_color" class="my-color-field" value="<?php echo esc_attr(get_option('mym_calculate_button_text_color')); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="mym_calculator_fields_label_color">Calculator Fields Label Color</label>
                    </th>
                    <td>
                        <input type="text" id="mym_calculator_fields_label_color" name="mym_calculator_fields_label_color" class="my-color-field" value="<?php echo esc_attr(get_option('mym_calculator_fields_label_color')); ?>">
                    </td>
                </tr>
            </tbody>
              </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
$industryDefault = get_option('mym_balance_at_60_if_industry_default');
$industryHighGrowth = get_option('mym_balance_at_60_if_industry_high_growth');
$turbo30 = get_option('mym_balance_at_60_if_turbo_30');
?>
<div id="investment-calculator">
    <form id="investment-form">
        <label class="mym-form-label" for="starting-balance">Starting Super Balance:</label>
        <input type="text" id="starting-balance" name="starting-balance" required value="150000">
        <br>
        <label class="mym-form-label" for="age">Age:</label>
        <input type="text" id="age" name="age" required value="45">
        <br>
        <label class="mym-form-label" for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required value="150000">
        <br>
        <button type="button" onclick="calculateInvestment()" style="margin-top: 10px;" class="mym-button">Calculate</button>
    </form>
    <div>
        <div id="show-diffrence"></div>
        <canvas id="investment-chart"></canvas>
    </div>
</div>
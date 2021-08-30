<?php
/**
 * Plugin Name:       Aurora Investment Calculator
 * Plugin URI:        https://aurortec.net/
 * Description:       Calculate revinu form investment
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.2
 * Author:            Manishankar Vakta
 * Author URI:        https://aurortec.net/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aurora-investment-calculator
 * Domain Path:       /languages
 */

 // Plugin Assest
 function my_plugin_assets() {
    // custome style
    wp_register_style( 'styleCss', plugins_url( '/css/style.css' , __FILE__ ), array(), '1.0', 'all' );
    wp_enqueue_style( 'styleCss' );    

    // customescript
    wp_register_script( 'script', plugins_url( '/js/script.js' , __FILE__ ), array(), '1.0', false );
    wp_enqueue_script( 'script' );
}
add_action( 'wp_footer', 'my_plugin_assets' );


 // create shortCode
function investment_calculator( $atts ){
?>

    <div class="calculator-wrapper">
        <h2 class="cal-title">Return on Investment Calculator</h2>
        <form>
            <div class="form-group">
                <label for="in-invest">Initial Investment</label>
                <input type="text" class="form-control float-right invest-amount" value="10000" min="0" max="100000" id="inInvestAmount"  oninput="inInvest.value=inInvestAmount.value">
                <span class="float-right" style="margin: 8px 10px"><b> $ </b> </span><br>
                <input type="range" min="0" max="1000000"  value="10000"  class="cal-slider" id="inInvest" oninput="inInvestAmount.value=inInvest.value"><br>
                <small id="in-invest-help" class="form-text text-muted">$0 <span  class="float-right">$1M</span></small>
            </div>
            <div class="form-group">
                <label for="add-invest">Annual Additional Investment</label>
                <input type="text" class="form-control float-right invest-amount"  value="10000" min="0" max="1000000"  id="addInvestAmount" oninput="addInvest.value=addInvestAmount.value">
                <span class="float-right" style="margin: 8px 10px"><b> $ </b> </span><br>
                <input type="range" min="0" max="1000000" value="10000" class="cal-slider" id="addInvest" oninput="addInvestAmount.value=addInvest.value"><br>
                <small id="add-invest-help" class="form-text text-muted">$0 <span class="float-right">$1M</span></small>
            </div>
            <div class="form-group">
                <label for="yearNum">Years to Invest</label>
                <input type="text" class="form-control float-right invest-amount"  min="0" max="2" value="1" id="yearNum"  oninput="yearNumRange.value=yearNum.value">
                <span class="float-right" style="margin: 8px 10px"><b> $ </b> </span><br>
                <input type="range" min="0" max="20" value="1" class="cal-slider" id="yearNumRange" oninput="yearNum.value=yearNumRange.value"><br>
                <small id="add-invest-help" class="form-text text-muted">0 Yrs <span class="float-right">20 Yrs</span></small>
            </div>
        </form>
        <h2 class="cal-title2">Cash flow at year <span>1</span></h2>
        <small class="form-text text-muted"><i>Based upon a 16% non-compounded annual return and 8% cash dividend.</i></small>
        <hr>
        <p>Portfolio Balance <span class="float-right" id="p_balance">$116,000</span></p>
        <p>Annual Cash Flow <span class="float-right" id="a_c_f">$9280</span></p>
        <p>Monthly Cash Flow <span class="float-right" id="m_c_f">$774</span></p>
       

    </div>

<?php
}
add_shortcode( 'investment_calculator', 'investment_calculator' );
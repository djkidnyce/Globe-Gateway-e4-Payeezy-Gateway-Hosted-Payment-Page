<?php
/*
Plugin Name: Global Gateway e4 | Payeezy Gateway |
Plugin URI: http://www.djkidnyce.com/plug-ins/
Description: This is for Global Gateway e4 | Payeezy Hosted Payment Page. Payeezy Made easier for WordPress users to set-up a pay button and much more on their website. Looking for something more custom to your likings contact me. 
Author: Donnell C
Version: 2.5
Author URI: http://djkidnyce.com/about/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=94N225YZWHHX2
*/

add_action('admin_menu', 'payeezy_hpp_main_menu');
function payeezy_hpp_main_menu() {
	//Main Level
	add_menu_page('Payeezy Gateway Settings', 'Payeezy Gateway', 'manage_options', 'Global-Gateway-e4-Payeezy-Gateway', 'e4hpp_admin' , plugins_url('/images/dashicon.png', __FILE__) );
	$dir = plugin_dir_path( __FILE__ );
	$the_file = 'xlogin_transkey.php';
	$include_html_sc_file = 'current_html.php';

	if (file_exists($dir. $the_file)){
		include($dir. $the_file);
	}
	if (file_exists($dir. $include_html_sc_file)) {// If current_html.php is created. Add Current HTML submenu.
		//2nd Level
		add_submenu_page('Global-Gateway-e4-Payeezy-Gateway', 'Current HTML', 'Current HTML', 'manage_options', 'Payeezy_HTML', 'Admin_HTML');
	}

}

if (version_compare(phpversion(), '5.2.17', '<=')) {
	// echo "PHP verison not over 5.2.17";
	} else {
	// Adds token life line. 7200 = 2 Hours 
	add_filter( 'nonce_life', function () { return 4 * 7200; } );
} 

function Public_HTML() {
	$dir = plugin_dir_path( __FILE__ );
	ob_start();
	$include_html_sc_file = 'current_html.php';
	// If current_html file is created. Add Short Code
	if (file_exists($dir. $include_html_sc_file)) {
	include($dir. $include_html_sc_file);
	//$output_string=ob_get_contents();
	//return $output_string;
	return ob_get_clean();
	}
}
add_shortcode('Payeeze_GGe4_Form', 'Public_HTML'); // Creates [Payeeze_GGe4_Form] short code 

function Admin_HTML() {
	$dir = plugin_dir_path( __FILE__ );
	$include_html_sc_file = 'current_html.php';
	// If current_html file is created. Add Short Code
	if (file_exists($dir. $include_html_sc_file)) {
		?>
		<head>
		<title>Current HTML</title>
		<meta name='author' content='DonnellC'>
		<meta name='description' content='This was created By:DonnellC Code-GEN'>
		<meta name='keywords' content='bd0f1c08b0efcff31efb4867d9176e28'>
		<style TYPE="text/css"> #document { width: 700px; margin-left: auto; margin-right: auto; text-align: center; margin-top: 30px; } body { font: 1.25em arial,helvetica,sans-serif; color:#999; } </style> 
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<div id="document"> 
		<?php
		include($dir. $include_html_sc_file);
		echo "<p><pre> [Payeeze_GGe4_Form] </pre></p>";
		echo '</div>';
		?>
		<div align="center">
		<h2>Do Not Make Changes Here, Select "Edit File"</h2>
		<?php echo "<textarea rows='30' cols='125' align='center'>"; echo file_get_contents($dir. $include_html_sc_file); echo "</textarea>"; ?>
		<br>
		 <a class='button-primary' href="<?php echo admin_url('plugin-editor.php?file=globe-gateway-e4%2Fcurrent_html.php&plugin=globe-gateway-e4%2Fcurrent_html.php') ;?>">Edit File</a> 
		 </div>
		<?php
	}
}

function e4hpp_admin(){
	$dir = plugin_dir_path( __FILE__ );
	$the_file = 'xlogin_transkey.php';
	$include_html_sc_file = 'current_html.php';
	$filename = $dir. $the_file;
	if (file_exists($filename)) {
		include($dir. $the_file);
	}

	// If Custom exist, Include it
	$custom_folder_name = 'custom'; // Folder name
	$custom_folder_path = dirname(__FILE__) . '/' . $custom_folder_name; // Folder directory
	if (is_dir($custom_folder_path)){ // Checks if the directory exist 
		$custom_files = "true";
		foreach (glob($custom_folder_path . '/*') as $file) //For each file
			$file  . "<br>\n";
			include($file); // Includes all files in the directory
			//echo "$num_files_in_custom_dir";
	}

/*
function page_admin_payeezy_gge4_settings() {
	//register our settings
	if($x_login){
		define( $x_login , register_setting( 'payeezy_gge4_settings', 'payeezy_x_login' ));
	}
	
	}
*/

?>
<script type="text/javascript"><!--//Place at the bottom to Speed up page loading time-->
function wantedchecked() {
    if (document.getElementById('recurring_b_f_c').checked) {
    	document.getElementById('recurring_billing_fields_checked').style.visibility = 'visible';
    	if (document.getElementById('once_checked').checked) {
			document.getElementById('once').style.visibility = 'visible';
			}
			else document.getElementById('once').style.visibility = 'collapse';

			if (document.getElementById('daily_checked').checked) {
			document.getElementById('daily').style.visibility = 'visible';
			}
			else document.getElementById('daily').style.visibility = 'collapse';

        			if (document.getElementById('weekly_checked').checked) {
			document.getElementById('weekly').style.visibility = 'visible';
			}
			else document.getElementById('weekly').style.visibility = 'collapse';

			if (document.getElementById('bi_weekly_checked').checked) {
			document.getElementById('bi_weekly').style.visibility = 'visible';
			}
			else document.getElementById('bi_weekly').style.visibility = 'collapse';

			if (document.getElementById('semi_monthly_checked').checked) {
			document.getElementById('semi_monthly').style.visibility = 'visible';
			}
			else document.getElementById('semi_monthly').style.visibility = 'collapse';

			if (document.getElementById('monthly_checked').checked) {
			document.getElementById('monthly').style.visibility = 'visible';
			}
			else document.getElementById('monthly').style.visibility = 'collapse';

			if (document.getElementById('bi_monthly_checked').checked) {
			document.getElementById('bi_monthly').style.visibility = 'visible';
			}
			else document.getElementById('bi_monthly').style.visibility = 'collapse';

			if (document.getElementById('quarterly_checked').checked) {
			document.getElementById('quarterly').style.visibility = 'visible';
			}
			else document.getElementById('quarterly').style.visibility = 'collapse';

			if (document.getElementById('four_months_checked').checked) {
			document.getElementById('four_months').style.visibility = 'visible';
			}
			else document.getElementById('four_months').style.visibility = 'collapse';

			if (document.getElementById('semi_annually_checked').checked) {
			document.getElementById('semi_annually').style.visibility = 'visible';
			}
			else document.getElementById('semi_annually').style.visibility = 'collapse';

			if (document.getElementById('annually_checked').checked) {
			document.getElementById('annually').style.visibility = 'visible';
			}
			else document.getElementById('annually').style.visibility = 'collapse';
		}
		else document.getElementById('recurring_billing_fields_checked').style.visibility = 'collapse';

	if (document.getElementById('header').checked) {
			document.getElementById('header_checked').style.visibility = 'visible';
	}
	else document.getElementById('header_checked').style.visibility = 'collapse';
	
	if (document.getElementById('back_color').checked) {
        document.getElementById('back_color_checked').style.visibility = 'visible';	
    }
    else document.getElementById('back_color_checked').style.visibility = 'collapse';
	
	if (document.getElementById('merchant_email_checked').checked) {
        document.getElementById('merchant_email').style.visibility = 'visible';	
    }
    else document.getElementById('merchant_email').style.visibility = 'collapse';

	if (document.getElementById('user_1_checked').checked) {
        document.getElementById('x_user_1').style.visibility = 'visible';	
    }
    else document.getElementById('x_user_1').style.visibility = 'collapse';

	if (document.getElementById('user_2_checked').checked) {
        document.getElementById('x_user_2').style.visibility = 'visible';	
    }
    else document.getElementById('x_user_2').style.visibility = 'collapse';

	if (document.getElementById('user_3_checked').checked) {
        document.getElementById('x_user_3').style.visibility = 'visible';	
    }
    else document.getElementById('x_user_3').style.visibility = 'collapse';

    	if (document.getElementById('x_tax_checked').checked){
	document.getElementById('x_tax').style.visibility = 'visible';
	}
    else
	document.getElementById('x_tax').style.visibility = 'collapse';

	if (document.getElementById('x_ga_tracking_id_checked').checked){
	document.getElementById('x_ga_tracking_id').style.visibility = 'visible';
	}
    else
	document.getElementById('x_ga_tracking_id').style.visibility = 'collapse';
	}

	//if (document.location.protocol != "https:"){
    //document.location = document.URL.replace(/^http:/i, "https:");
	//}
</script>
<link rel='shortcut icon' href='<?php echo plugins_url('globe-gateway-e4/' .'images/payeezy_favicon.png' ); ?>' />
<link href="<?php echo plugins_url('globe-gateway-e4/' .'css/GobleGateway.css' ); ?>" media="screen" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="<?php echo plugins_url('globe-gateway-e4/' .'js/jscolor/jscolor.js' ); ?>"></script>
<div class="wrap">
	<div class="payeezy-settings-form">
		<div class="row">
		<h1>Global Gateway e4 | Payeezy Gateway | Clover Gateway<span>Hosted Payment Page Settings</span></h1>
		<div class="col-3 col-m-3"><table>
			<form name='verify_login_transkey' method='POST' action='<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>'><!--Code Form-->
					<tr><!--Payment Page ID-->
						<td>
							<div class="moreinfo">
								<label>Payment Page ID
								<span class="moreinfotext">Payment Page ID from the Payeezy Gateway Payment Pages interface. From Hash Calculator Tab (Login (x_login))</span> 
							</div>
							<input type='text' name="x_login_raw" value="<?php echo $x_login; ?>" size="30" autocomplete="off" placeholder="Payment Page ID" required autofocus/></label>
						</td>
					</tr>
					<tr><!--Transaction Key-->
						<td>
							<div class="moreinfo">
								<label>Transaction Key
								<span class="moreinfotext">Transaction Key from the Payeezy Gateway Payment Pages interface. From Hash Calculator or Security Tab (Transaction Key)</span> 
							</div>	
							<input type='text' name="transaction_key_raw" value="<?php echo $transaction_key; ?>" size="30" autocomplete="off" placeholder="Transaction Key" required/></label>
						</td>
						<input type="hidden" name="csrf_token" value="<?php echo wp_create_nonce('payeezy_nonce'); ?>" />
					</tr>
					<tr><!--Live or Demo-->
						<td>
						<div class="moreinfo">
							<label>Live or Demo
							<span class="moreinfotext">Live is Production. You can not use Live Payment Page ID's in Demo. You will need to create a demo account.</span> 
						</div>	
							<select name="live_demo" id="live_demo">
							<option value="Live" <?php if( $live_demo == "https://globalgatewaye4.firstdata.com/payment" ): echo 'selected'; endif;?>>Live</option>
							<option value="Demo" <?php if( $live_demo == "https://demo.globalgatewaye4.firstdata.com/payment" ): echo 'selected'; endif;?>>Demo</option>
							</select></label>
						</td>
					</tr>
					<tr><!--Transaction Type-->
						<td>
							<div class="moreinfo">
								<label>Transaction Type
								<span class="moreinfotext">Purchase will allow you to recieve funding.  Pre Authorization's are only good for upto 1 week.</span> 	
							</div>		
								<select name="x_type" id="x_type">
								<option value="AUTH_CAPTURE" <?php if( $x_type == "AUTH_CAPTURE" ): echo 'selected'; endif;?> >Purchase/Sale</option>
								<option value="AUTH_ONLY" <?php if( $x_type == "AUTH_ONLY" ): echo 'selected'; endif;?> >Pre-Authorization</option>
								</select></label>
						</td>
					</tr>
					<tr><!--Currency-->
						<td>
							<div class="moreinfo">
								<label>Currency
								<span class="moreinfotext">The Currency Code MUST agree with the currency of the payment page.</span>
							</div>
						<select name="currency_code" id="currency_code">
									<option value="ADF">	Andorran Franc    (ADF)</option>
									<option value="ADP">	Andorran Peseta    (ADP)</option>
									<option value="AED">	Utd. Arab Emir. Dirham    (AED)</option>
									<option value="AFA">	Afghanistan Afghani    (AFA)</option>
									<option value="ALL">	Albanian Lek    (ALL)</option>
									<option value="ANG">	NL Antillian Guilder    (ANG)</option>
									<option value="AON">	Angolan New Kwanza    (AON)</option>
									<option value="ARS">	Argentine Peso    (ARS)</option>
									<option value="ATS">	Austrian Schilling    (ATS)</option>
									<option value="AUD">	Australian Dollar    (AUD)</option>
									<option value="AWG">	Aruban Florin    (AWG)</option>
									<option value="BBD">	Barbados Dollar    (BBD)</option>
									<option value="BDT">	Bangladeshi Taka    (BDT)</option>
									<option value="BEF">	Belgian Franc    (BEF)</option>
									<option value="BGL">	Bulgarian Lev    (BGL)</option>
									<option value="BHD">	Bahraini Dinar    (BHD)</option>
									<option value="BIF">	Burundi Franc    (BIF)</option>
									<option value="BMD">	Bermudian Dollar    (BMD)</option>
									<option value="BND">	Brunei Dollar    (BND)</option>
									<option value="BOB">	Bolivian Boliviano    (BOB)</option>
									<option value="BRL">	Brazilian Real    (BRL)</option>
									<option value="BSD">	Bahamanian Dollar    (BSD)</option>
									<option value="BTN">	Bhutan Ngultrum    (BTN)</option>
									<option value="BWP">	Botswana Pula    (BWP)</option>
									<option value="BZD">	Belize Dollar    (BZD)</option>
									<option value="CAD">	Canadian Dollar    (CAD)</option>
									<option value="CHF">	Swiss Franc    (CHF)</option>
									<option value="CLP">	Chilean Peso    (CLP)</option>
									<option value="CNY">	Chinese Yuan Renminbi    (CNY)</option>
									<option value="COP">	Colombian Peso    (COP)</option>
									<option value="CRC">	Costa Rican Colon    (CRC)</option>
									<option value="CSK">	Czech Koruna    (CSK)</option>
									<option value="CVE">	Cape Verde Escudo    (CVE)</option>
									<option value="CYP">	Cyprus Pound    (CYP)</option>
									<option value="DEM">	German Mark    (DEM)</option>
									<option value="DJF">	Djibouti Franc    (DJF)</option>
									<option value="DKK">	Danish Krone    (DKK)</option>
									<option value="DOP">	Dominican Peso    (DOP)</option>
									<option value="DZD">	Algerian Dinar    (DZD)</option>
									<option value="ECS">	Ecuador Sucre    (ECS)</option>
									<option value="EEK">	Estonian Kroon    (EEK)</option>
									<option value="EGP">	Egyptian Pound    EGP)</option>
									<option value="ESP">	Spanish Peseta    (ESP)</option>
									<option value="ETB">	Ethiopian Birr    (ETB)</option>
									<option value="EUR">	Euro    (EUR)</option>
									<option value="FIM">	Finnish Markka    (FIM)</option>
									<option value="FJD">	Fiji Dollar    (FJD)</option>
									<option value="FKP">	Falkland Islands Pound    (FKP)</option>
									<option value="FRF">	French Franc    (FRF)</option>
									<option value="GBP">	British Pound    (GBP)</option>
									<option value="GHC">	Ghanaian Cedi    (GHC)</option>
									<option value="GIP">	Gibraltar Pound    (GIP)</option>
									<option value="GMD">	Gambian Dalasi    (GMD)</option>
									<option value="GNF">	Guinea Franc    (GNF)</option>
									<option value="GRD">	Greek Drachma    (GRD)</option>
									<option value="GTQ">	Guatemalan Quetzal    (GTQ)</option>
									<option value="GYD">	Guyanan Dollar    (GYD)</option>
									<option value="HKD">	Hong Kong Dollar    (HKD)</option>
									<option value="HNL">	Honduran Lempira    (HNL)</option>
									<option value="HRK">	Croatian Kuna    (HRK)</option>
									<option value="HTG">	Haitian Gourde    (HTG)</option>
									<option value="HUF">	Hungarian Forint    (HUF)</option>
									<option value="IDR">	Indonesian Rupiah    (IDR)</option>
									<option value="IEP">	Irish Punt    (IEP)</option>
									<option value="ILS">	Israeli New Shekel    (ILS)</option>
									<option value="INR">	Indian Rupee    (INR)</option>
									<option value="ISK">	Iceland Krona    (ISK)</option>
									<option value="ITL">	Italian Lira    (ITL)</option>
									<option value="JMD">	Jamaican Dollar    (JMD)</option>
									<option value="JOD">	Jordanian Dinar    (JOD)</option>
									<option value="JPY">	Japanese Yen    (JPY)</option>
									<option value="KES">	Kenyan Shilling    (KES)</option>
									<option value="KHR">	Cambodian Riel    (KHR)</option>
									<option value="KMF">	Comoros Franc    (KMF)</option>
									<option value="KRW">	South-Korean Won    (KRW)</option>
									<option value="KWD">	Kuwaiti Dinar    (KWD)</option>
									<option value="KYD">	Cayman Islands Dollar    (KYD)</option>
									<option value="KZT">	Kazakhstan Tenge    (KZT)</option>
									<option value="LAK">	Lao Kip    (LAK)</option>
									<option value="LKR">	Sri Lanka Rupee    (LKR)</option>
									<option value="LRD">	Liberian Dollar    (LRD)</option>
									<option value="LSL">	Lesotho Loti    (LSL)</option>
									<option value="LTL">	Lithuanian Litas    (LTL)</option>
									<option value="LUF">	Luxembourg Franc    (LUF)</option>
									<option value="LVL">	Latvian Lats    (LVL)</option>
									<option value="MAD">	Moroccan Dirham    (MAD)</option>
									<option value="MGF">	Malagasy Franc    (MGF)</option>
									<option value="MMK">	Myanmar Kyat    (MMK)</option>
									<option value="MNT">	Mongolian Tugrik    (MNT)</option>
									<option value="MOP">	Macau Pataca    (MOP)</option>
									<option value="MRO">	Mauritanian Ouguiya    (MRO)</option>
									<option value="MTL">	Maltese Lira    (MTL)</option>
									<option value="MUR">	Mauritius Rupee    (MUR)</option>
									<option value="MVR">	Maldive Rufiyaa    (MVR)</option>
									<option value="MWK">	Malawi Kwacha    (MWK)</option>
									<option value="MXN">	Mexican Peso    (MXN)</option>
									<option value="MYR">	Malaysian Ringgit    (MYR)</option>
									<option value="MZM">	Mozambique Metical    (MZM)</option>
									<option value="NAD">	Namibia Dollar    (NAD)</option>
									<option value="NGN">	Nigerian Naira    (NGN)</option>
									<option value="NIO">	Nicaraguan Cordoba Oro    (NIO)</option>
									<option value="NLG">	Dutch Guilder    (NLG)</option>
									<option value="NOK">	Norwegian Kroner    (NOK)</option>
									<option value="NPR">	Nepalese Rupee    (NPR)</option>
									<option value="NZD">	New Zealand Dollar    (NZD)</option>
									<option value="OMR">	Omani Rial    (OMR)</option>
									<option value="PAB">	Panamanian Balboa    (PAB)</option>
									<option value="PEN">	Peruvian Nuevo Sol    (PEN)</option>
									<option value="PGK">	Papua New Guinea Kina    (PGK)</option>
									<option value="PHP">	Philippine Peso    (PHP)</option>
									<option value="PKR">	Pakistan Rupee    (PKR)</option>
									<option value="PLN">	Polish Zloty    (PLN)</option>
									<option value="PTE">	Portuguese Escudo    (PTE)</option>
									<option value="PYG">	Paraguay Guarani    (PYG)</option>
									<option value="QAR">	Qatari Rial    (QAR)</option>
									<option value="ROL">	Romanian Leu    (ROL)</option>
									<option value="RUB">	Russian Rouble    (RUB)</option>
									<option value="SAR">	Saudi Riyal    (SAR)</option>
									<option value="SBD">	Solomon Islands Dollar    (SBD)</option>
									<option value="SCR">	Seychelles Rupee    (SCR)</option>
									<option value="SEK">	Swedish Krona    (SEK)</option>
									<option value="SGD">	Singapore Dollar    (SGD)</option>
									<option value="SHP">	St. Helena Pound    (SHP)</option>
									<option value="SIT">	Slovenian Tolar    (SIT)</option>
									<option value="SKK">	Slovak Koruna    (SKK)</option>
									<option value="SLL">	Sierra Leone Leone    (SLL)</option>
									<option value="SRG">	Suriname Guilder    (SRG)</option>
									<option value="STD">	Sao Tome/Principe Dobra    (STD)</option>
									<option value="SVC">	El Salvador Colon    (SVC)</option>
									<option value="SZL">	Swaziland Lilangeni    (SZL)</option>
									<option value="THB">	Thai Baht    (THB)</option>
									<option value="TND">	Tunisian Dinar    (TND)</option>
									<option value="TOP">	Tonga Paanga    (TOP)</option>
									<option value="TRL">	Turkish Lira    (TRL)</option>
									<option value="TTD">	Trinidad/Tobago Dollar    (TTD)</option>
									<option value="TWD">	Taiwan Dollar    (TWD)</option>
									<option value="TZS">	Tanzanian Shilling    (TZS)</option>
									<option value="UAH">	Ukraine Hryvnia    (UAH)</option>
									<option value="UGS">	Uganda Shilling    (UGS)</option>
									<option value="USD" selected>	U.S. Dollar (USD)</option>
									<option value="UYP">	Uruguayan Peso    (UYP)</option>
									<option value="VEB">	Venezuelan Bolivar    (VEB)</option>
									<option value="VND">	Vietnamese Dong    (VND)</option>
									<option value="VUV">	Vanuatu Vatu    (VUV)</option>
									<option value="WST">	Samoan Tala    (WST)</option>
									<option value="XAF">	CFA Franc BEAC    (XAF)</option>
									<option value="XAG">	Silver (oz.)    (XAG)</option>
									<option value="XAU">	Gold (oz.)    (XAU)</option>
									<option value="XEU">	ECU    (XEU)</option>
									<option value="XOF">	CFA Franc BCEAO    (XOF)</option>
									<option value="XPD">	Palladium (oz.)    (XPD)</option>
									<option value="XPT">	Platinum (oz.)    (XPT)</option>
									<option value="YUN">	Yugoslav Dinar    (YUN)</option>
									<option value="ZAR">	South African Rand    (ZAR)</option>
									<option value="ZMK">	Zambian Kwacha    (ZMK)</option>
						</select>
						</td></label>
					</tr>
					<tr><!--HMAC Calculation-->
						<td>
							<div class="moreinfo">	
								<label>HMAC Calculation
								<span class="moreinfotext">MD5 is the basic standard for the payment page. SHA-1 is recommended and believed to be more secure. To use SHA-1, you MUST select SHA1 on the pagement page under the Security tab and save your changes.</span>
							</div>
						<select name="hmac_calculation" id="hmac_calculation">
						<option value="SHA1" <?php if( $hmac_calculation == "SHA1" ): echo 'selected'; endif;?> >SHA-1</option>
						<option value="MD5" <?php if( $hmac_calculation == "MD5" ): echo 'selected'; endif;?> >MD5</option>
						</select></label>
						</td>
					</tr>
					<tr><!--Auto Submit-->
						<td>
						<div id='wait_or_auto'>
						<label><input type="radio" name="wait_or_auto" value="auto_submit" <?php if( $wait_or_auto == "auto_submit" ): echo 'checked'; endif;?>>Auto Submit Payment</label>
						</div>
						</td>
					</tr>
		</table></div>
		
		<div class="col-10 col-m-10"><table>		
					<tr><!--First Name and Last Name-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='1'>First Name and Last Name</input></label>
						</td>
					</tr>
					<tr><!--Billing Address Fields-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='3'>Billing Address Fields</input></label>
						</td>
					</tr>
					<tr><!--Shipping Address Fields-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='4'>Shipping Address Fields</input></label>
						</td>
					</tr>
					<tr><!--Country-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='7'>Country</input></label>
						</td>
					</tr>
					<tr><!--Phone Number-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='22'>Phone Number</input></label>
						</td>
					</tr>
					<tr><!--Fax Number-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='23'>Fax Number</input></label>
						</td>
					</tr>
					<tr><!--Company-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='2'>Company</input></label>
						</td>
					</tr>
					<tr><!--Email-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='8'>Email</input></label>
						</td>
					</tr>
					<tr><!--Invoice Number-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='9'>Invoice Number</input></label>
						</td>
					</tr>
					<tr><!--PO Number-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='10'>PO Number</input></label>
						</td>
					</tr>
					<tr><!--Reference 3-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='11'>Reference 3</input></label>
						</td>
					</tr>
					<tr><!--Description Or Comments-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='27'>Description Or Comments</input></label>
						</td>
					</tr>
		</table></div>
		<div class="col-9 col-m-1"><table>
					<tr><!--Tax-->
						<td>
							<div class="moreinfo">
								<span class="moreinfotext">This will not show on the receipt as tax. It will be included into the amount.</span>
								<label><input type='checkbox' name='attributes[]' onclick='javascript:wantedchecked();' id='x_tax_checked' <?php if( $x_tax != null ): echo 'checked'; endif;?>>Charge Tax</input></label>
							</div>
						</td>
						<td style="visibility:collapse">
						<div id="x_tax" ><input type='tax' id='x_tax' name='x_tax_raw' placeholder='.06' size='4' value='<?php echo $x_tax *100; ?>'/>
						</div>
						</td>
					</tr>
					<tr><!--Google Analytics-->
						<td>
							<div class="moreinfo">
								<span class="moreinfotext">Google Analytics can now be used with the Hosted Checkout. Google Analytics Tracking ID can be used to track and generate key eCommerce metrics relating to customers' visits to checkout pages.</span>
								<label><input type='checkbox' name='attributes[]' value='28' onclick='javascript:wantedchecked();' id='x_ga_tracking_id_checked' <?php if( $x_ga_tracking_id != null ): echo 'checked'; endif;?>>Google Analytics</input></label>
							</div>
						</td>
						<td style="visibility:collapse">
						<div id="x_ga_tracking_id" ><input type='text' id='x_ga_tracking_id' name='x_ga_tracking_id_raw' placeholder='' value='<?php echo $x_ga_tracking_id; ?>'/>
						To get the Tracking ID from Google Analytics, please follow the instructions in here: <a target="_blank" href="https://support.google.com/analytics/answer/1032385">https://support.google.com/analytics/answer/1032385</a>
						</div>
						</td>
					</tr>
					<tr><!--Nameable Field 1-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='24' onclick='javascript:wantedchecked();' id='user_1_checked'>Nameable Field 1</input></label>
						</td>
						<td style="visibility:collapse">
						<div id="x_user_1" ><label>Change to:<input type='text' id='x_user_1' name='user_1' placeholder='Nameable User Field 1' value='<?php echo $user_1; ?>'/></label>
						</div>
						</td>
					</tr>
					<tr><!--Nameable Field 2-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='25' onclick='javascript:wantedchecked();' id='user_2_checked'>Nameable Field 2</input></label>
						</td>
						<td style="visibility:collapse">
						<div id="x_user_2" ><label>Change to:<input type='text' id='x_user_2' name='user_2' placeholder='Nameable User Field 2' value='<?php echo $user_2; ?>'/></label>
						</div>
						</td>
					</tr>
					<tr><!--Nameable Field 3-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='26' onclick='javascript:wantedchecked();' id='user_3_checked'>Nameable Field 3</input></label>
						</td>
						<td style="visibility:collapse">
						<div id="x_user_3" ><label>Change to:<input type='text' id='x_user_3' name='user_3' placeholder='Nameable User Field 3' value='<?php echo $user_3; ?>'/></label>
						</div>
						</td>
					</tr>
					<tr><!--Logo On The Payment Page-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='20' onclick='javascript:wantedchecked();' id='header'>
						<div class="moreinfo">Show Your Logo On The Payment Page<span class="moreinfotext">Displayed on header of Payment Form and Receipt Page. If empty or not a valid URL, the default value from the Payeezy Gateway Payment Pages interface is taken.</span></div></input></label>
						</td>
						<td style="visibility:collapse">
							<div id="header_checked" >
								<label>Logo URL:<input type='text' id='x_logo_url' name='x_logo_url_raw' placeholder='Logo URL' value='<?php echo $x_logo_url; ?>' size="30"/></label>
							</div>
						</td>
					</tr>
					<tr><!--Recurring Billing Fields-->
						<td> 
						<label><input type='checkbox' name='attributes[]' value='15' onclick='javascript:wantedchecked();' id='recurring_b_f_c'>Recurring Billing Fields</input></label>
						<tbody id="recurring_billing_fields_checked" style="visibility:collapse">
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='101' onclick='javascript:wantedchecked();' id='once_checked'>Once</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='once' ><label>Once Billing ID:<input type='text' name='once_raw' placeholder='Once Billing ID' value='<?php echo $once; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='102' onclick='javascript:wantedchecked();' id='daily_checked'>Daily</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='daily' ><label>Daily Billing ID:<input type='text' name='daily_raw' placeholder='Daily Billing ID' value='<?php echo $daily; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='103' onclick='javascript:wantedchecked();' id='weekly_checked'>Weekly</input></label>
							</td>	
								<td style="visibility:collapse">
								<div id='weekly' ><label>Weekly Billing ID:<input type='text' name='weekly_raw' placeholder='Weekly Billing ID' value='<?php echo $weekly; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='104' onclick='javascript:wantedchecked();' id='bi_weekly_checked'>Bi-Weekly</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='bi_weekly' ><label>Bi-Weekly Billing ID:<input type='text' name='bi_weekly_raw' placeholder='Bi-Weekly Billing ID' value='<?php echo $bi_weekly; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='105' onclick='javascript:wantedchecked();' id='semi_monthly_checked'>Semi-Monthly</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='semi_monthly' ><label>Semi-Monthly Billing ID:<input type='text' name='semi_monthly_raw' placeholder='Semi-Monthly Billing ID' value='<?php echo $semi_monthly; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='106' onclick='javascript:wantedchecked();' id='monthly_checked'>Monthly</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='monthly' ><label>Monthly Billing ID:<input type='text' name='monthly_raw' placeholder='Monthly Billing ID' value='<?php echo $monthly; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='107' onclick='javascript:wantedchecked();' id='bi_monthly_checked'>Bi-Monthly</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='bi_monthly' ><label>Bi-Monthly Billing ID:<input type='text' name='bi_monthly_raw' placeholder='Bi-Monthly Billing ID'  value='<?php echo $bi_monthly; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='108' onclick='javascript:wantedchecked();' id='quarterly_checked'>Quarterly</input></label>
							</td>
								<td style="visibility:collapse">	
								<div id='quarterly' ><label>Quarterly Billing ID:<input type='text' name='quarterly_raw' placeholder='Quarterly Billing ID'  value='<?php echo $quarterly; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='109' onclick='javascript:wantedchecked();' id='four_months_checked'> 4 Months</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='four_months' ><label>4 Months Billing ID:<input type='text' name='four_months_raw' placeholder='4 Months Billing ID' value='<?php echo $four_months; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='110' onclick='javascript:wantedchecked();' id='semi_annually_checked'>Semi-Annually</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='semi_annually' ><label>Semi-Annually Billing ID:<input type='text' name='semi_annually_raw' placeholder='Semi-Annually Billing ID'  value='<?php echo $semi_annually; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
							<td>
							<label><input type='checkbox' name='recurring[]' value='111' onclick='javascript:wantedchecked();' id='annually_checked'> Annually</input></label>
							</td>
								<td style="visibility:collapse">
								<div id='annually' ><label>Annually Billing ID:<input type='text' name='annually_raw' placeholder='Annually Billing ID' value='<?php echo $annually; ?>'/></label>
								</div>
								</td>
								</tr>
							<tr>
								<td>
								<div id='recurring_auto_or_customer_select'>
								<label><input type="radio" name="recurring_auto_or_customer_select" value="auto_recurring" <?php if( $recurring_auto_or_customer_select == "auto_recurring" ): echo 'checked'; endif;?>>Automatic Recurring For 2 Years</label>
								<label><input type="radio" name="recurring_auto_or_customer_select" value="customer_select" <?php if( $recurring_auto_or_customer_select == "customer_select" ): echo 'checked'; endif;?>>Customer Select Start and End Date</label>
								</div>
								</td>
							</tr>
						</tbody>
						</td>
					</tr> <!--End Recurring Fields-->
					<tr><!--Background Color For Payment Page-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='21' onclick='javascript:wantedchecked();' id='back_color'>
						<div class="moreinfo">Background Color For Payment Page<span class="moreinfotext">Background color of the Payment Form and Receipt Page. If empty or invalid, default value from the Payeezy Gateway Payment Pages interface is used.</span></div></input></label>
						</td>
						<td style="visibility:collapse">
						<div id="back_color_checked" ><label>Pick Your Background Color:<input type='text' id='x_color_background' name='x_color_background' value='<?php echo $x_color_background; ?>' class="color" size="7"/></label>
						</div>
						</td>
					</tr>
					<tr><!--Merchant E-Mail-->
						<td>
							<label>
								<input type='checkbox' name='attributes[]' value='6' onclick='javascript:wantedchecked();' id='merchant_email_checked'>
								<div class="moreinfo">Merchant E-Mail<span class="moreinfotext">Copy of the customer confirmation email should be sent to.</span></div></input>
							</label>
						</td>
						<td style="visibility:collapse">
						<div id="merchant_email" >
							<label>E-Mail:<input type='text' id='x_merchant_email' name='x_merchant_email_raw' placeholder='Your Email Address Here' value='<?php echo $x_merchant_email; ?>' size="30"/></label>
						</div>
						</td>
					</tr>
					<tr><!--Amount-->
						<td>
						<label><input type='checkbox' name='attributes[]' value='12' checked onclick='return false'>Amount</input></label>
						<!--- <label><div class="moreinfo">Specific Amount<input type='text' name='x_specific_amount' placeholder='100.00'  value='<?php echo $x_specific_amount; ?>'/>
						<span class="moreinfotext">Entering an amount here, will remove the option for your customer to enter an amount.</span></div>
						</label> -->
						</td>
					</tr>
					<tr><!--Button-->
						<td>
						<input class='button-primary' type='submit' value='Generate Code' />
						</td>
					</tr>
			</form>
			<tr><!--Short Code-->
					<td>
					<p><pre><b><a>[Payeeze_GGe4_Form]</a></b></pre>Short Code that can be used instend of the HTML code (Once HTML is created)</p>
					<!--
					<br/>
					<p><pre><a>[Store_Customer_Data]</a></pre>Short Code that will be used to store customers data.</p>
					-->
					</td>
			</tr>
			<tr><!--Upload-form-->
					<td>
						<form method = "POST"  action = "<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" class="wp-upload-form" enctype = "multipart/form-data">
							<input type="hidden" name="csrf_token" value="<?php echo wp_create_nonce('payeezy_nonce'); ?>" />
							<input type = "file" name = "wp_payezee_file_upload" />
							<input disabled="" name="install-plugin-submit" id="install-plugin-submit" class="button" value="Upload" type="submit">
						</form>
					</td>
			</tr>
		</table></div>
		</div><!-- Close Row  -->
	</div><!-- Close payeezy-settings-form  -->
	<div class="payeezy-settings-form-footer">
		<div class="section"><span>Support</span></div>
			<div class="inner-wrap">
				<a target="_blank" href="http://wordpress.org/support/plugin/globe-gateway-e4"><img src="<?php echo plugins_url('globe-gateway-e4/' .'images/wordpress.png' ); ?>" height='50' width='50'></a>
				<a target="_blank" href="mailto:Support@DJKidNyce.com?subject=Global%20Gateway%20e4%20%7C%20Payeezy%20Gateway%20%7C%20Support"><img src="<?php echo plugins_url('globe-gateway-e4/' .'images/email.png' ); ?>" height='50' width='50'></a>
				<br>
				Love this plug-in please leave a
				<a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/globe-gateway-e4#postform">Review</a>
				<br>
			</div>
		<?php if (file_exists($dir. $the_file)){
			echo "<div class='section'><span>Change History</span></div>";
			echo "<div class='inner-wrap'>";
			echo "Last Date and Time HTML was created:";
			echo "<br>";
			echo $time_stamp;
			echo "<br>";
			echo "</div>";
			}
		?>
		<div class="section"><span>Author</span></div>
			<div class="inner-wrap">
				<a target="_blank" href="//djkidnyce.com"><img src="<?php echo plugins_url('globe-gateway-e4/' .'images/DonnellC.png' ); ?>" height='50' width='250'></a>
				<form target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="94N225YZWHHX2">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="Donate to This Great Plug-in Today">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
		<form name='verify_login_transkey' method='POST' action='<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>'>
			<input type="hidden" name="csrf_token" value="<?php echo wp_create_nonce('payeezy_nonce'); ?>" />
			<input type="hidden" name="backup_plugin" value="backup">
			<input class="button-primary" type="submit" value="Create Backup">
		</form>
	</div><!-- Close payeezy-settings-form-footer  -->
</div>
<?php if ($custom_files == 'true') { ?><!--Custom Files Counter-->
	<table class="alignright">
		<th>Files In Custom Folder</th>
			<?php
				$show_custom_files_url = new FilesystemIterator($custom_folder_path, FilesystemIterator::SKIP_DOTS);
					foreach ($show_custom_files_url as $file) {
						echo "<tr><td>";
						//echo plugins_url('globe-gateway-e4' . '/' . $custom_folder_name. '/');
						echo $show_custom_files_url;
						echo "</td></tr>";
					} ?>
	</table>
<?php } ?>

<?php
//CSRF Protection
if(isset($_POST['csrf_token'])){
		if(wp_verify_nonce($_POST['csrf_token'], 'payeezy_nonce')) {
			// Upload to custom folder
			if(isset($_FILES['wp_payezee_file_upload'])){
      			$errors= array();
      			$wp_payezee_file_name = strtolower($_FILES['wp_payezee_file_upload']['name']); // Converts name to lowercase
      			$wp_payezee_tmp = explode('.', $wp_payezee_file_name);
      			$wp_payezee_file_size = $_FILES['wp_payezee_file_upload']['size'];
      			$wp_payezee_file_tmp = $_FILES['wp_payezee_file_upload']['tmp_name'];
      			$wp_payezee_file_ext=end($wp_payezee_tmp); 

      			$expensions= array("php","PHP","html","htm"); // At this time only php files will be uploaded
      
      			if(in_array($wp_payezee_file_ext,$expensions)=== false){
         				$errors[]="extension not allowed, please choose a php file.";
      			}

      			if($wp_payezee_file_size > 2097152) {
      				$errors[]='File size must be exactly 2 MB';
      			}
      
      			if(empty($errors)==true) {
      				if(is_dir($custom_folder_path)==FALSE){
      					mkdir($custom_folder_path);
      					$blank_php_fn = $custom_folder_path . "/" ."index.php";
      					$blank_php_data = "<?php // Silence is Awesome. No-one can see what in this directory" . "\n" .
						"\$num_files_in_custom_dir = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);". "\n"."?>";
      					file_put_contents($blank_php_fn, $blank_php_data);
      				}
         				move_uploaded_file($wp_payezee_file_tmp,$custom_folder_path . '/' .$wp_payezee_file_name);
         				//echo "<marquee behavior='slide' >";
         				echo "<ul>";
         				echo "File Uploaded Successfully";
         				echo "<li>Uploaded File Name:"; echo $wp_payezee_file_name;
         				echo "<li>Uploaded File Size:" ; echo $_FILES['wp_payezee_file_upload']['size'];
         				echo "<li>Uploaded File Type:" ; echo $_FILES['wp_payezee_file_upload']['type'];
         				echo "</ul>";
         				//echo "</marquee>";
         			}else{
         				print_r($errors);
         			}
         		} // End File upload
         		
         		// Make backup plugin files
		$source = dirname(__FILE__) . '/'; 
		$backup_file_name = 'WP_PayeezyGateway_Plugin_Backup' . date("m-j-y@g:i:sa") .'.zip';
		$destination = dirname(__FILE__) . '/' . $backup_file_name;
		$password = "test";
		// Create backup
		if($_POST['backup_plugin']  == "backup"){
         			if (extension_loaded('zip')) {
         				if (file_exists($source)) {
         					$zip = new ZipArchive();
         					if ($zip->open($destination, ZIPARCHIVE::CREATE)) {
         						$source = realpath($source);
         						if (is_dir($source)) {
         							$iterator = new RecursiveDirectoryIterator($source);
         							// skip dot files while iterating 
         							$iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
         							$files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
         							foreach ($files as $file) {
         								$file = realpath($file);
         								if (is_dir($file)) {
         									$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
         								} else if (is_file($file)) {
         									$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
         								}
         							}
         						} else if (is_file($source)) {
         							$zip->addFromString(basename($source), file_get_contents($source));
         						}
         					}
         					echo "<div align='center'>";
         					echo "<a class='button-primary' href=";
         					echo  plugins_url('globe-gateway-e4/' . $backup_file_name );
         					echo ">";
         					echo "Download Backup";
         					echo "</a>";
         					echo"</div>";
         					$zip->close();
         					//unlink($backup_file_name);
         				}
         			}
         			?>			
         		<script type="text/javascript">
		window.onload=counter;
		function counter(){
			seconds = 30;
			countDown();
		}	

		function countDown(){
			document.getElementById("remainding").innerHTML=seconds;
			setTimeout("countDown()",1000);
			if(seconds == 0){
			document.deletezip.submit();
			}else {
			seconds--;		
			}
		}
		</script>
         		<h4 align="center"> Deleting backup zip on server in: </h4><h2 align="center"><span id="remainding"></span></h2>
         		<br>
         					<form name='deletezip' id='deletezip' method='POST' action='<?php echo plugins_url('globe-gateway-e4/' .'downloadBackup.php' ); ?>'>
					<input type="hidden" name="csrf_token" value="<?php echo wp_create_nonce('payeezy_nonce'); ?>" />
					<input type="hidden" name="download_current_backup" value="<?php echo $backup_file_name; ?>"> 
					<input type='hidden' class="button-primary" type="submit" value="Delete After">
					</form>
					<?php
         		}
			
		
			function get_code(){
		//get there selected checkboxes
		$code_wanted = $_POST['attributes'];
		$arrylen = count($code_wanted);
		
		if ($arrylen == 0){			//check if they didn't select anything and hit submit
			return "";
		}else{
			//set strings that will be used after the user checks the boxes
			$first_last = htmlspecialchars("<tr><td>First Name:</td><td><input type='text'name='x_first_name' placeholder='First Name' required></td></tr>")."\n".htmlspecialchars("<tr><td>Last Name:</td><td><input type='text'name='x_last_name' placeholder='Last Name' required></td></tr>")."\n";
			$x_company = htmlspecialchars("<tr><td>Company:</td><td><input type='text'name='x_company' placeholder='Company Name' required></td></tr>")."\n";
			$x_address = htmlspecialchars("<tr><td>Billing Address:</td><td><input type='text'name='x_address' placeholder='Address' required></td></tr>").htmlspecialchars("<tr><td>City:</td><td><input type='text'name='x_city' placeholder='City' required></td></tr>")."\n". 
																htmlspecialchars("<tr><td>State</td><td><select name='x_state' id='x_state'>
																<option value='..' selected='1'>
																<option value='AK'> AK </option>
																<option value='AL'> AL </option>
																<option value='AR'> AR </option>
																<option value='AZ'> AZ </option>
																<option value='CA'> CA </option>
																<option value='CO'> CO </option>
																<option value='CT'> CT </option>
																<option value='DC'> DC </option>
																<option value='DE'> DE </option>
																<option value='FL'> FL </option>
																<option value='GA'> GA </option>
																<option value='HI'> HI </option>
																<option value='IA'> IA </option>
																<option value='ID'> ID </option>
																<option value='IL'> IL </option>
																<option value='IN'> IN </option>
																<option value='KS'> KS </option>
																<option value='KY'> KY </option>
																<option value='LA'> LA </option>
																<option value='MA'> MA </option>
																<option value='MD'> MD </option>
																<option value='ME'> ME </option>
																<option value='MI'> MI </option>
																<option value='MN'> MN </option>
																<option value='MO'> MO </option>
																<option value='MS'> MS </option>
																<option value='MT'> MT </option>
																<option value='NC'> NC </option>
																<option value='ND'> ND </option>
																<option value='NE'> NE </option>
																<option value='NH'> NH </option>
																<option value='NJ'> NJ </option>
																<option value='NM'> NM </option>
																<option value='NV'> NV </option>
																<option value='NY'> NY </option>
																<option value='OH'> OH </option>
																<option value='OK'> OK </option>
																<option value='OR'> OR </option>
																<option value='PA'> PA </option>
																<option value='PR'> PR </option>
																<option value='RI'> RI </option>
																<option value='SC'> SC </option>
																<option value='SD'> SD </option>
																<option value='TN'> TN </option>
																<option value='TX'> TX </option>
																<option value='UT'> UT </option>
																<option value='VA'> VA </option>
																<option value='VI'> VI </option>
																<option value='VT'> VT </option>
																<option value='WA'> WA </option>
																<option value='WI'> WI </option>
																<option value='WV'> WV </option>
																<option value='WY'> WY </option>
																</select></tr></td>")."\n". 
																htmlspecialchars("<tr><td>Zip Code:</td><td><input type='text'name='x_zip' placeholder='Zip Code' required></td></tr>")."\n";
			$js_address = plugins_url('globe-gateway-e4/' .'js/address/address.js' );
			$x_ship_address =  htmlspecialchars("<script type='text/javascript' src='$js_address'></script><tr><td>Same as Billing Adddress</td><td><input type='checkbox' name='billing_to_shipping_name' onclick='copy_address(this.form)'></td><tr><td>Shipping Address:</td><td><input type='text'name='x_ship_to_address' placeholder='Shipping Address' required></td></tr>")."\n". 
			htmlspecialchars("<tr><td>City:</td><td><input type='text'name='x_ship_to_city' placeholder='City' required></td></tr>")."\n". 
																htmlspecialchars("<tr><td>State</td><td><select name='x_ship_to_state' id='x_ship_to_state'>
																<option value='..' selected='1'>
																<option value='AK'> AK </option>
																<option value='AL'> AL </option>
																<option value='AR'> AR </option>
																<option value='AZ'> AZ </option>
																<option value='CA'> CA </option>
																<option value='CO'> CO </option>
																<option value='CT'> CT </option>
																<option value='DC'> DC </option>
																<option value='DE'> DE </option>
																<option value='FL'> FL </option>
																<option value='GA'> GA </option>
																<option value='HI'> HI </option>
																<option value='IA'> IA </option>
																<option value='ID'> ID </option>
																<option value='IL'> IL </option>
																<option value='IN'> IN </option>
																<option value='KS'> KS </option>
																<option value='KY'> KY </option>
																<option value='LA'> LA </option>
																<option value='MA'> MA </option>
																<option value='MD'> MD </option>
																<option value='ME'> ME </option>
																<option value='MI'> MI </option>
																<option value='MN'> MN </option>
																<option value='MO'> MO </option>
																<option value='MS'> MS </option>
																<option value='MT'> MT </option>
																<option value='NC'> NC </option>
																<option value='ND'> ND </option>
																<option value='NE'> NE </option>
																<option value='NH'> NH </option>
																<option value='NJ'> NJ </option>
																<option value='NM'> NM </option>
																<option value='NV'> NV </option>
																<option value='NY'> NY </option>
																<option value='OH'> OH </option>
																<option value='OK'> OK </option>
																<option value='OR'> OR </option>
																<option value='PA'> PA </option>
																<option value='PR'> PR </option>
																<option value='RI'> RI </option>
																<option value='SC'> SC </option>
																<option value='SD'> SD </option>
																<option value='TN'> TN </option>
																<option value='TX'> TX </option>
																<option value='UT'> UT </option>
																<option value='VA'> VA </option>
																<option value='VI'> VI </option>
																<option value='VT'> VT </option>
																<option value='WA'> WA </option>
																<option value='WI'> WI </option>
																<option value='WV'> WV </option>
																<option value='WY'> WY </option>
																</select></td></tr>")."\n". 
																htmlspecialchars("<tr><td>Zip Code:</td><td><input type='text'name='x_ship_to_zip' placeholder='Zip Code' required></td></tr>")."\n";
			$level_3_Fields = htmlspecialchars("<br>Tax Exempt<select name='x_tax_exempt' id='x_tax_exempt'>
																<option value='..' selected='1'>
																<option value='TRUE'> Yes </option>
																<option value='FALSE'> No </option>
																</select>")."\n".
																htmlspecialchars("<br>Tax  Amount:<input type='text' name='x_tax'>")."\n".
																htmlspecialchars("<br>Freight:<input type='text' name='x_freight'>")."\n".
																htmlspecialchars("<br>Duty:<input type='text' name='x_duty'>")."\n".
																htmlspecialchars("<br>Discount amount:<input type='text' name='discount_amount'>")."\n";
			$x_country = htmlspecialchars("<tr><td>Country:</td><td><input type='text' name='x_country' placeholder='Billing County' required></td></tr>")."\n";
			$x_email = htmlspecialchars("<tr><td>E-Mail:</td><td><input type='text' name='x_email' required placeholder='Enter a valid email address' required></td></tr>")."\n";
			$x_invoice_num = htmlspecialchars("<tr><td>Invoice Number:</td><td><input type='text' name='x_invoice_num' placeholder='Invoice/Account Number' required></td></tr>")."\n";
			$x_po_num = htmlspecialchars("<tr><td>Po Number:</td><td><input type='text' name='x_po_num' placeholder='Purchase Order Number' required></td></tr>")."\n";
			$x_reference_3 = htmlspecialchars("<tr><td>Reference 3:</td><td><input type='text' name='x_reference_3' placeholder='Reference Number' required></td></tr>")."\n";

			if (!empty($_POST['x_specific_amount'])) {
				//remove amount field
			} else {
				$x_amount = htmlspecialchars("<tr><td>Amount:</td><td><input type='text' name='x_amount' placeholder='Amount' min='1' required></td></tr>")."\n";
			}
			$x_amount = htmlspecialchars("<tr><td>Amount:</td><td><input type='text' name='x_amount' placeholder='Amount' min='1' required></td></tr>")."\n";
			$js_cal_css = plugins_url('globe-gateway-e4/' .'js/calendar/tcal.css');
			$js_cal_js = plugins_url('globe-gateway-e4/' .'js/calendar/tcal.js' );
			$js_recurring = plugins_url('globe-gateway-e4/' .'js/recurring/recurring.js' );
			$loading_icon = plugins_url('globe-gateway-e4/' .'gifs/loading_icon.gif');
			
			// Recurring Options
			
			$wanted_recurring = $_POST['recurring'];
			$recurring_select = count($wanted_recurring);
		
			if ($recurring_select == 0){			//check if they didn't select anything and hit submit
			//return "";
			}else{
			$recurring_option = htmlspecialchars("<tr><td>Frequency</td><td>")."\n" .htmlspecialchars("<select name='x_recurring_billing_id'>")."\n";
			$recurring_option_php = "";

			$x_once = htmlspecialchars("<option value='once'>Once</option>")."\n";
			$x_daily = htmlspecialchars("<option value='daily'>Daily</option>")."\n";
			$x_weekly = htmlspecialchars("<option value='weekly'>Weekly</option>")."\n";
			$x_bi_weekly = htmlspecialchars("<option value='bi_weekly'>Bi-Weekly</option>")."\n";
			$x_semi_monthly = htmlspecialchars("<option value='semi_monthly'>Semi-monthly</option>")."\n";
			$x_monthly = htmlspecialchars("<option value='monthly'>Monthly</option>")."\n";
			$x_bi_monthly = htmlspecialchars("<option value='bi_monthly'>Bi-Monthly</option>")."\n";
			$x_quarterly = htmlspecialchars("<option value='quarterly'>Quarterly</option>")."\n";
			$x_four_months = htmlspecialchars("<option value='four_months'>4 Months</option>")."\n";
			$x_semi_annually = htmlspecialchars("<option value='semi_annually'>Semi Annually</option>")."\n";
			$x_annually = htmlspecialchars("<option value='annually'>Annually</option>")."\n";

			$x_once_php = "if(\$_POST['x_recurring_billing_id'] == 'once'){"."\n"."\$x_recurring_billing_id = \$once; "."\n"."}" ."\n";
			$x_daily_php = "if(\$_POST['x_recurring_billing_id'] == 'daily'){"."\n"."\$x_recurring_billing_id = \$daily; "."\n"."}" ."\n";
			$x_weekly_php = "if(\$_POST['x_recurring_billing_id'] == 'weekly'){"."\n"."\$x_recurring_billing_id = \$weekly; "."\n"."}" ."\n";
			$x_bi_weekly_php = "if(\$_POST['x_recurring_billing_id'] == 'bi_weekly'){"."\n"."\$x_recurring_billing_id = \$bi_weekly; "."\n"."}" ."\n";
			$x_semi_monthly_php = "if(\$_POST['x_recurring_billing_id'] == 'semi_monthly'){"."\n"."\$x_recurring_billing_id = \$semi_monthly; "."\n"."}" ."\n";
			$x_monthly_php = "if(\$_POST['x_recurring_billing_id'] == 'monthly'){"."\n"."\$x_recurring_billing_id = \$monthly; "."\n"."}" ."\n";
			$x_bi_monthly_php = "if(\$_POST['x_recurring_billing_id'] == 'bi_monthly'){"."\n"."\$x_recurring_billing_id = \$bi_monthly; "."\n"."}" ."\n";
			$x_quarterly_php = "if(\$_POST['x_recurring_billing_id'] == 'quarterly'){"."\n"."\$x_recurring_billing_id = \$quarterly; "."\n"."}" ."\n";
			$x_four_months_php = "if(\$_POST['x_recurring_billing_id'] == 'four_months'){"."\n"."\$x_recurring_billing_id = \$four_months; "."\n"."}" ."\n";
			$x_semi_annually_php = "if(\$_POST['x_recurring_billing_id'] == 'semi_annually'){"."\n"."\$x_recurring_billing_id = \$semi_annually; "."\n"."}" ."\n";
			$x_annually_php = "if(\$_POST['x_recurring_billing_id'] == 'annually'){"."\n"."\$x_recurring_billing_id = \$annually; "."\n"."}" ."\n";

			if ($recurring_select == 1){	//check if they only selected one
				if($wanted_recurring[0] == 101){
					$recurring_option .= $x_once;
					$recurring_option_php .= $x_once_php;
				}
				if($wanted_recurring[0] == 102){
					$recurring_option .= $x_daily;
					$recurring_option_php .= $x_daily_php;
				}
				if($wanted_recurring[0] == 103){
					$recurring_option .= $x_weekly;
					$recurring_option_php .= $x_weekly_php;
				}
				if($wanted_recurring[0] == 104){
					$recurring_option .= $x_bi_weekly;
					$recurring_option_php .= $x_bi_weekly_php;
				}
				if($wanted_recurring[0] == 105){
					$recurring_option .= $x_semi_monthly;
					$recurring_option_php .= $x_semi_monthly_php;
				}
				if($wanted_recurring[0] == 106){
					$recurring_option .= $x_monthly;
					$recurring_option_php .= $x_monthly_php;
				}
				if($wanted_recurring[0] == 107){
					$recurring_option .= $x_bi_monthly;
					$recurring_option_php .= $x_bi_monthly_php;
				}
				if($wanted_recurring[0] == 108){
					$recurring_option .= $x_quarterly;
					$recurring_option_php .= $x_quarterly_php;
				}
				if($wanted_recurring[0] == 109){
					$recurring_option .= $x_four_months;
					$recurring_option_php .= $x_four_months_php;
				}
				if($wanted_recurring[0] == 110){
					$recurring_option .= $x_semi_annually;
					$recurring_option_php .= $x_semi_annually_php;
				}
				if($wanted_recurring[0] == 111){
					$recurring_option .= $x_annually;
					$recurring_option_php .= $x_annually_php;
				}
			}else{						//if the selected multiple options for the form
				for ($x = 0; $x < $recurring_select; $x++){
					if($wanted_recurring[$x] == 101){
						$recurring_option .= $x_once;
						$recurring_option_php .= $x_once_php;
					} 
					if($wanted_recurring[$x] == 102){
						$recurring_option .= $x_daily;
						$recurring_option_php .= $x_daily_php;
					} 
					if($wanted_recurring[$x] == 103){
						$recurring_option .= $x_weekly;
						$recurring_option_php .= $x_weekly_php;
					} 
					if($wanted_recurring[$x] == 104){
						$recurring_option .= $x_bi_weekly;
						$recurring_option_php .= $x_bi_weekly_php;
					} 
					if($wanted_recurring[$x] == 105){
						$recurring_option .= $x_semi_monthly;
						$recurring_option_php .= $x_semi_monthly_php;
					} 
					if($wanted_recurring[$x] == 106){
						$recurring_option .= $x_monthly;
						$recurring_option_php .= $x_monthly_php;
					} 
					if($wanted_recurring[$x] == 107){
						$recurring_option .= $x_bi_monthly;
						$recurring_option_php .= $x_bi_monthly_php;
					} 
					if($wanted_recurring[$x] == 108){
						$recurring_option .= $x_quarterly;
						$recurring_option_php .= $x_quarterly_php;
					} 
					if($wanted_recurring[$x] == 109){
						$recurring_option .= $x_four_months;
						$recurring_option_php .= $x_four_months_php;
					} 
					if($wanted_recurring[$x] == 110){
						$recurring_option .= $x_semi_annually;
						$recurring_option_php .= $x_semi_annually_php;
					} 
					if($wanted_recurring[$x] == 111){
						$recurring_option .= $x_annually;
						$recurring_option_php .= $x_annually_php;
					}
				}
			}
			$recurring_option .= htmlspecialchars("</select></td></tr>");
			$recurring_option_php .= "";
		}

			//$recurring_auto_or_customer_select =$_POST['recurring_auto_or_customer_select'];
			if($_POST['recurring_auto_or_customer_select'] == "customer_select"){
				$recurring_auto_or_customer_select = "customer_select";
				$recurrning_html = htmlspecialchars("<tbody style='visibility:collapse' id='recurring_billing'>")."\n" .
				htmlspecialchars("<tr><td>Start Date</td><td><input type='text' name='x_recurring_billing_start_date' class='tcal'></td></tr>")."\n".
			htmlspecialchars("<tr><td>End Date</td><td><input type='text' name='x_recurring_billing_end_date' class='tcal'></td></tr>")."\n". $recurring_option ."\n";
				$php_x_recurring_billing_fields = "if ( \$recurring= \$_POST['recurring'] == 'TRUE'){
			//code to be executed if condition is true;
\$x_recurring_billing = 'TRUE'; \n
\$x_recurring_billing_start_date = \$_POST['x_recurring_billing_start_date']; \n
\$x_recurring_billing_end_date = \$_POST['x_recurring_billing_end_date']; \n
\$x_recurring_billing_amount = \$_POST['x_recurring_billing_amount']; \n".
$recurring_option_php
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing\" value=\"' . \$x_recurring_billing . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_id\" value=\"' . \$x_recurring_billing_id . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_start_date\" value=\"' . \$x_recurring_billing_start_date . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_end_date\" value=\"' . \$x_recurring_billing_end_date . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_amount\" value=\"' . \$x_recurring_billing_amount . '\">' );}else{\n\n}")."\n";
				}else{
				$recurring_auto_or_customer_select = "auto_recurring";
				$recurrning_html = htmlspecialchars("<tbody style='visibility:collapse' id='recurring_billing'>")."\n" . $recurring_option ."\n";
				$php_x_recurring_billing_fields = "if ( \$recurring= \$_POST['recurring'] == 'TRUE'){
			//code to be executed if condition is true;
\$x_recurring_billing = 'TRUE'; \n
\$date = strtotime(date(\"Y-m-d\")); \n
\$x_recurring_billing_start_date = date(\"Y-m-d\", strtotime(\"+1 month\", \$date)); \n
\$x_recurring_billing_end_date = date(\"Y-m-d\", strtotime(\"+25 month\", \$date)); \n
\$x_recurring_billing_amount = \$_POST['x_recurring_billing_amount']; \n" .
$recurring_option_php
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing\" value=\"' . \$x_recurring_billing . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_id\" value=\"' . \$x_recurring_billing_id . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_start_date\" value=\"' . \$x_recurring_billing_start_date . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_end_date\" value=\"' . \$x_recurring_billing_end_date . '\">' );")."\n"
			.htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_recurring_billing_amount\" value=\"' . \$x_recurring_billing_amount . '\">' );}else{\n\n}")."\n";

					}
			$x_recurring_billing_fields = 
			htmlspecialchars("<script type='text/javascript' src='$js_cal_js'></script>")."\n".
			htmlspecialchars("<script type='text/javascript' src='$js_recurring'></script>")."\n".
			htmlspecialchars("<link rel='stylesheet' type='text/css' href='$js_cal_css'/>")."\n".
			htmlspecialchars("<tr><td>Recurring?</td><td>
				<input type='checkbox' name='recurring' value='TRUE' onclick='javascript:recurringenabled();' id='recurring'> Yes</input>
			</td></tr>")."\n". $recurrning_html .
			htmlspecialchars("<tr><td>Recurring Amount:</td><td><input type='text' name='x_recurring_billing_amount' placeholder='Recurring Amount'></td></tr>")."\n".
			htmlspecialchars("</tbody>")."\n";
			//New fields 
			$phone_pattern = "pattern='^\d{3}-\d{3}-\d{4}$' ";
			$x_phone = htmlspecialchars("<tr><td>Phone Number:</td><td><input type='text' name='x_phone' placeholder='000-000-0000' required></td></tr>")."\n";
			$x_fax = htmlspecialchars("<tr><td>Fax Number:</td><td><input type='text' name='x_fax' placeholder='000-000-0000' required></td></tr>")."\n";
			// User name field names will be changed. 
			$user_1 =$_POST['user_1'];
			$user_2 =$_POST['user_2'];
			$user_3 =$_POST['user_3'];
			$x_user1 = htmlspecialchars("<tr><td>$user_1:</td><td><input type='text' name='x_user1' required></td></tr>")."\n";
			$x_user2 = htmlspecialchars("<tr><td>$user_2:</td><td><input type='text' name='x_user2' required></td></tr>")."\n";
			$x_user3 = htmlspecialchars("<tr><td>$user_3:</td><td><input type='text' name='x_user3' required></td></tr>")."\n";
			// Add Tax
			if ($_POST['x_tax_raw'] == 0 || is_null($_POST['x_tax_raw'])) {
				$x_tax =$x_tax_raw;
			}else{
				$x_tax_raw =$_POST['x_tax_raw'] /100;
				$x_tax =$x_tax_raw;
			}
			
			// Comments or Description Maybe change the name of the field option. 
			$x_description = htmlspecialchars("<tr><td>Comments or Description</td><td><textarea name='x_description' spellcheck='true' placeholder='Notes Here' value=''></textarea></td></tr>")."\n";
			
			//strings for php codes
			$find_not_needed = (' ');
			$replace_all = ('');
			$x_login_raw = $_POST['x_login_raw'];
			$x_login = str_replace($find_not_needed,$replace_all,$x_login_raw);
			
			$transaction_key_raw = $_POST['transaction_key_raw'];
			$transaction_key = str_replace($find_not_needed,$replace_all,$transaction_key_raw);

			// Recurring fields
			$once_raw = $_POST['once_raw'];
			$once = str_replace($find_not_needed,$replace_all,$once_raw);
			$daily_raw = $_POST['daily_raw'];
			$daily = str_replace($find_not_needed,$replace_all,$daily_raw);
			$weekly_raw = $_POST['weekly_raw'];
			$weekly = str_replace($find_not_needed,$replace_all,$weekly_raw);
			$bi_weekly_raw = $_POST['bi_weekly_raw'];
			$bi_weekly = str_replace($find_not_needed,$replace_all,$bi_weekly_raw);
			$semi_monthly_raw = $_POST['semi_monthly_raw'];
			$semi_monthly = str_replace($find_not_needed,$replace_all,$semi_monthly_raw);
			$monthly_raw = $_POST['monthly_raw'];
			$monthly = str_replace($find_not_needed,$replace_all,$monthly_raw);
			$bi_monthly_raw = $_POST['bi_monthly_raw'];
			$bi_monthly = str_replace($find_not_needed,$replace_all,$bi_monthly_raw);
			$quarterly_raw = $_POST['quarterly_raw'];
			$quarterly = str_replace($find_not_needed,$replace_all,$quarterly_raw);
			$four_months_raw = $_POST['four_months_raw'];
			$four_months = str_replace($find_not_needed,$replace_all,$four_months_raw);
			$semi_annually_raw = $_POST['semi_annually_raw'];
			$semi_annually = str_replace($find_not_needed,$replace_all,$semi_annually_raw);
			$annually_raw = $_POST['annually_raw'];
			$annually = str_replace($find_not_needed,$replace_all,$annually_raw);

			
			$x_currency_code =$_POST['currency_code'];
			//$hmac_calculation =$_POST['hmac_calculation'];
			if($_POST['hmac_calculation'] == "SHA1"){
				$hmac_calculation = "SHA1";
				}else{
				$hmac_calculation = "MD5";
			}

			//$live_demo =$_POST['live_demo'];
			if($_POST['live_demo'] == "Live"){
				$live_demo = "https://globalgatewaye4.firstdata.com/payment";
				}else{
				$live_demo = "https://demo.globalgatewaye4.firstdata.com/payment";
			}
			//$x_type =$_POST['x_type'];
			if($_POST['x_type'] == "AUTH_ONLY"){
				$x_type = "AUTH_ONLY";
				}else{
				$x_type = "AUTH_CAPTURE";
			}
		
			//$wait_or_auto =$_POST['wait_or_auto'];
			if($_POST['wait_or_auto'] == "confirm"){
				$wait_or_auto = "confirm";
				$confirmation_page_top = "";
				$confirmation_page_bottom = "<input class='button-primary' type='submit' value='Submit Payment' />" . "</form>";
				}else{
				$wait_or_auto = "auto_submit";
				$confirmation_page_top = "<SCRIPT LANGUAGE=\"JavaScript\"> setTimeout('document.confirm.submit()',1000*5); </SCRIPT>";
				$confirmation_page_bottom = "</form>"."Processing your \$ <?php echo \$x_amount?> payment <?php echo \$x_first_name ?>, please wait...";
			}

			$time_stamp = date('l F jS Y H:i:s', current_time( 'timestamp', 0 )); // H:i:s current_time( 'timestamp', 0 )  date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) )
			// Confirm file, transaction key, and Current HTML
			$confirm_file = 'confirm'.'.php';
			$my_file = plugins_url('globe-gateway-e4/') . $confirm_file;
			$xlogin_transkey = 'xlogin_transkey'.'.php';
			$xlogin_transkey_location = plugins_url('globe-gateway-e4/') . $xlogin_transkey;
			$html_file = 'current_html'.'.php';
			$html_file_location = plugins_url('globe-gateway-e4/') . $html_file;
			// Hosted payment page design
			$x_logo_url_raw =$_POST['x_logo_url_raw'];
			$x_logo_url = str_replace($find_not_needed,$replace_all,$x_logo_url_raw);
			// LINK / GET / POST / AUTO-GET / AUTO-POST
			$x_receipt_link_method = "AUTO-POST";
			// Target of hyperlinked text or action for HTML GET/POST. If empty or not a valid URL, the default value from the Payeezy Gateway Payment Pages interface is taken.
			//$x_receipt_link_url = plugins_url('globe-gateway-e4/') . 'dump.php';
			// Hyperlinked text or submit button value. With GET or POST a form is generated with hidden fields that contain the result of the processed transaction. If empty, default value "Return to Merchant website title" is used. Merchant website title is set in the Payeezy Gateway Payment Pages interface.
			//$x_receipt_link_text = "Continue To Complete Transaction";

			$x_color_background =$_POST['x_color_background'];
			// E-Mail Setting Fields
			$x_merchant_email_raw =$_POST['x_merchant_email_raw'];
			$x_merchant_email = str_replace($find_not_needed,$replace_all,$x_merchant_email_raw);
			//$filename = uniqid('confirm', true) . '.php';
			
			$php_first_last = "\$x_first_name = \$_POST['x_first_name'];\n\$x_last_name = \$_POST['x_last_name']; \n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_first_name\" value=\"' . \$x_first_name . '\">' );")."\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_last_name\" value=\"' . \$x_last_name . '\">' );")."\n";
			$php_x_company = "\$x_company = \$_POST['x_company'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_company\" value=\"' . \$x_company . '\">' );")."\n";
			$php_x_address = "\$x_address = \$_POST['x_address'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_address\" value=\"' . \$x_address . '\">' );")."\n"."\$x_city = \$_POST['x_city'];\n".
			htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_city\" value=\"' . \$x_city . '\">' );")."\n"."\$x_state = \$_POST['x_state'];\n".
			htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_state\" value=\"' . \$x_state . '\">' );")."\n".
			"\$x_zip = \$_POST['x_zip'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_zip\" value=\"' . \$x_zip . '\">' );")."\n";
			$php_x_ship_address= "\$x_ship_to_address = \$_POST['x_ship_to_address'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_ship_to_address\" value=\"' . \$x_ship_to_address . '\">' );")."\n"."\$x_ship_to_city = \$_POST['x_ship_to_city'];\n".
			htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_ship_to_city\" value=\"' . \$x_ship_to_city . '\">' );")."\n"."\$x_ship_to_state = \$_POST['x_ship_to_state'];\n".
			htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_ship_to_state\" value=\"' . \$x_ship_to_state . '\">' );")."\n".
			"\$x_ship_to_zip = \$_POST['x_ship_to_zip'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_ship_to_zip\" value=\"' . \$x_ship_to_zip . '\">' );")."\n";
			$php_level_3_Fields = "\$x_tax_exempt = \$_POST['x_tax_exempt'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_tax_exempt\" value=\"' . \$x_tax_exempt . '\">' );")."\n".
			"\$x_tax = \$_POST['x_tax'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_tax\" value=\"' . \$x_tax . '\">' );")."\n".
			"\$x_freight = \$_POST['x_freight'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_freight\" value=\"' . \$x_freight . '\">' );")."\n".
			"\$x_duty = \$_POST['x_duty'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_duty\" value=\"' . \$x_duty . '\">' );")."\n".
			"\$discount_amount = \$_POST['discount_amount'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"discount_amount\" value=\"' . \$discount_amount . '\">' );")."\n";
			$php_x_merchant_email = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_merchant_email\" value=\"' . \$x_merchant_email . '\">' );")."\n";
			$php_x_country= "\$x_country = \$_POST['x_country'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_country\" value=\"' . \$x_country . '\">' );")."\n";
			$php_x_email = "\$x_email = \$_POST['x_email'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_email\" value=\"' . \$x_email . '\">' );")."\n";
			$php_x_invoice_num = "\$x_invoice_num = \$_POST['x_invoice_num'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_invoice_num\" value=\"' . \$x_invoice_num . '\">' );")."\n";
			$php_x_po_num = "\$x_po_num = \$_POST['x_po_num'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_po_num\" value=\"' . \$x_po_num . '\">' );")."\n";
			$php_x_reference_3 = "\$x_reference_3 = \$_POST['x_reference_3'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_reference_3\" value=\"' . \$x_reference_3 . '\">' );")."\n";

			//
			
			$php_x_amount = "if (\$x_tax == 0 || is_null(\$x_tax)) {\$x_amount = \$_POST['x_amount'];}else{
			\$x_amount = \$_POST['x_amount'] * \$x_tax + \$_POST['x_amount'];}\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_amount\" value=\"' . \$x_amount  . '\">' );")."\n";
			// New Fields 
			$php_x_phone = "\$x_phone = \$_POST['x_phone'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_phone\" value=\"' . \$x_phone . '\">' );")."\n";
			$php_x_fax = "\$x_fax = \$_POST['x_fax'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_fax\" value=\"' . \$x_fax . '\">' );")."\n";
			$php_x_user1 = "\$x_user1 = \$_POST['x_user1'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_user1\" value=\"' . \$x_user1 . '\">' );")."\n";
			$php_x_user2 = "\$x_user2 = \$_POST['x_user2'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_user2\" value=\"' . \$x_user2 . '\">' );")."\n";
			$php_x_user3 = "\$x_user3 = \$_POST['x_user3'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_user3\" value=\"' . \$x_user3 . '\">' );")."\n";
			$php_x_description = "\$x_description = \$_POST['x_description'];\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_description\" value=\"' . \$x_description . '\">' );")."\n";
			$x_ga_tracking_id_raw = $_POST['x_ga_tracking_id'];
			$x_ga_tracking_id = str_replace($find_not_needed,$replace_all,$x_ga_tracking_id);
			$php_x_ga_tracking_id = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_ga_tracking_id\" value=\"' . \$x_ga_tracking_id . '\">' );")."\n";

			$php_x_fp_sequence = "\$x_fp_sequence = rand(1000, 100000) + 123456;\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_fp_sequence\" value=\"' . \$x_fp_sequence . '\">' );")."\n";
			$php_x_fp_timestamp = "\$x_fp_timestamp = time();\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_fp_timestamp\" value=\"' . \$x_fp_timestamp . '\">' );")."\n";															
			$php_hmac_data = "\$hmac_data = \$x_login . \"^\" . \$x_fp_sequence . \"^\". \$x_fp_timestamp . \"^\" . \$x_amount . \"^\" . \$x_currency_code;\n";
			$php_x_fp_hash = "\$x_fp_hash = hash_hmac('$hmac_calculation', \$hmac_data, \$transaction_key);\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_fp_hash\" value=\"' . \$x_fp_hash . '\" size=\"50\">' );")."\n".htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_login\" value=\"' . \$x_login . '\">' );")."\n";
			$php_x_logo_url = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_logo_url\" value=\"' . \$x_logo_url . '\">' );")."\n";
			$php_x_receipt_link_method = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_receipt_link_method\" value=\"' . \$x_receipt_link_method . '\">' );")."\n";
			//$php_x_receipt_link_url = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_receipt_link_url\" value=\"' . \$x_receipt_link_url . '\">' );")."\n";
			//$php_x_receipt_link_text = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_receipt_link_text\" value=\"' . \$x_receipt_link_text . '\">' );")."\n";
			$php_x_color_background = htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_color_background\" value=\"' . \$x_color_background . '\">' );")."\n";
			
			
			
			//set a code separate from what the php will be so it can be added together later
			
			$token_file = htmlspecialchars("<?php require_once 'classes/token.php'; ?>")."\n" ;
			$html_token = htmlspecialchars("<input type='hidden' name='token' value='<?php echo Token::generate(); ?>'>")."\n" ;
			$form_code = htmlspecialchars("<table align='center' border='1'>")."\n" .htmlspecialchars("<form method='POST' action='$my_file'>")."\n";
			
			//the php code that will go along with the form they created
			//will allow for you to easily add the form validation code for each one
			$php_code = htmlspecialchars(
			"<head>
<title>Confirmation</title>
<link rel='shortcut icon' href='./gifs/loader_green_icon.gif'>
<meta name='author' content='DonnellC'>
<meta name='description' content='This was created By:DonnellC Code-GEN'>
<meta name='keywords' content='bd0f1c08b0efcff31efb4867d9176e28'>
<style TYPE=\"text/css\"> #document { width: 700px; margin-left: auto; margin-right: auto; text-align: center; margin-top: 30px; } body { font: 1.25em arial,helvetica,sans-serif; color:#999; } </style> 
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
".$confirmation_page_top." </head> <body> <div id=\"document\">
<img src='./gifs/green_loader.gif' height='300' width='300'>
<form name=\"confirm\" id=\"confirm\" action=\"$live_demo\">".
"\n<?php
//Created By: DonnellC | | If you are looking at this. You seem to know what you are doing.//
srand(time());			
require('./xlogin_transkey.php'); 
").
htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_currency_code\" value=\"' . \$x_currency_code . '\">' );")."\n".
htmlspecialchars("echo ('<input type=\"hidden\" name=\"x_type\" value=\"' . \$x_type . '\">' );")."\n";
			// Stores the info the user entered
			$store_xlogin_trans_key = htmlspecialchars("<?php")."\n" .
			htmlspecialchars("\$x_login = \"$x_login\";
				\n\$transaction_key = \"$transaction_key\";
				\n\$hmac_calculation = \"$hmac_calculation\";
				\n\$x_currency_code = \"$x_currency_code\";
				\n\$x_type = \"$x_type\";
				\n\$live_demo = \"$live_demo\";
				\n\$wait_or_auto = \"$wait_or_auto\";
				\n\$recurring_auto_or_customer_select = \"$recurring_auto_or_customer_select\";
				\n\$once = \"$once\";
				\n\$daily = \"$daily\";
				\n\$weekly = \"$weekly\";
				\n\$bi_weekly = \"$bi_weekly\";
				\n\$semi_monthly = \"$semi_monthly\";
				\n\$monthly = \"$monthly\";
				\n\$bi_monthly = \"$bi_monthly\";
				\n\$quarterly = \"$quarterly\";
				\n\$four_months = \"$four_months\";
				\n\$semi_annually = \"$semi_annually\";
				\n\$annually = \"$annually\";
				\n\$x_logo_url = \"$x_logo_url\";
				\n\$user_1 = \"$user_1\";
				\n\$user_2 = \"$user_2\";
				\n\$user_3 = \"$user_3\";
				\n\$x_tax = \"$x_tax\";
				\n\$x_ga_tracking_id = \"$x_ga_tracking_id\";
				\n\$x_color_background = \"$x_color_background\";
				\n\$x_merchant_email = \"$x_merchant_email\";
				\n\$time_stamp = \"$time_stamp\";
				\n\$x_receipt_link_method = \"$x_receipt_link_method\";
				\n\$x_receipt_link_url = \"$x_receipt_link_url\";
				\n\$x_receipt_link_text = \"$x_receipt_link_text\";
				\n");
			
			if ($arrylen == 1){	//check if they only selected one
				if($code_wanted[0] == 1){
					$form_code .= $first_last;
					$php_code .= $php_first_last;
				}
				if($code_wanted[0] == 2){
					$form_code .= $x_company;
					$php_code .= $php_x_company;
				}
				if($code_wanted[0] == 3){
					$form_code .= $x_address;
					$php_code .= $php_x_address;
				}
				if($code_wanted[0] == 4){
					$form_code .= $x_ship_address;
					$php_code .= $php_x_ship_address;
				}
				if($code_wanted[0] == 5){
					$form_code .= $level_3_Fields;
					$php_code .= $php_level_3_Fields;
				}
				if($code_wanted[0] == 6){
					$php_code .= $php_x_merchant_email;
				}
				if($code_wanted[0] == 7){
					$form_code .= $x_country;
					$php_code .= $php_x_country;
				}
				if($code_wanted[0] == 8){
					$form_code .= $x_email;
					$php_code .= $php_x_email;
				}
				if($code_wanted[0] == 9){
					$form_code .= $x_invoice_num;
					$php_code .= $php_x_invoice_num;
				}
				if($code_wanted[0] == 10){
					$form_code .= $x_po_num;
					$php_code .= $php_x_po_num;
				}
				if($code_wanted[0] == 11){
					$form_code .= $x_reference_3;
					$php_code .= $php_x_reference_3;
				}
				if($code_wanted[0] == 12){
					$form_code .= $x_amount;
					$php_code .= $php_x_amount;
					$php_code .= $php_x_fp_sequence;
					$php_code .= $php_x_fp_timestamp;
					$php_code .= $php_hmac_data;
					$php_code .= $php_x_fp_hash;
				}
				if($code_wanted[0] == 13){
					$php_code .= $php_x_login;
				}
				if($code_wanted[0] == 14){
					$php_code .= $php_transaction_key;
				}
				if($code_wanted[0] == 15){
					$form_code .= $x_recurring_billing_fields;
					$php_code .= $php_x_recurring_billing_fields;
				}
				if($code_wanted[0] == 20){
					$php_code .= $php_x_logo_url;
				}
				if($code_wanted[0] == 21){
					$php_code .= $php_x_color_background;
				}
				if($code_wanted[0] == 22){
					$form_code .= $x_phone;
					$php_code .= $php_x_phone;
				}
				if($code_wanted[0] == 23){
					$form_code .= $x_fax;
					$php_code .= $php_x_fax;
				}
				if($code_wanted[0] == 24){
					$form_code .= $x_user1;
					$php_code .= $php_x_user1;
				}
				if($code_wanted[0] == 25){
					$form_code .= $x_user2;
					$php_code .= $php_x_user2;
				}
				if($code_wanted[0] == 26){
					$form_code .= $x_user3;
					$php_code .= $php_x_user3;
				}
				if($code_wanted[0] == 27){
					$form_code .= $x_description;
					$php_code .= $php_x_description;
				}
				if($code_wanted[0] == 28){
					$php_code .= $php_x_ga_tracking_id;
				}

			}else{						//if the selected multiple options for the form
				for ($x = 0; $x < $arrylen; $x++){
					if($code_wanted[$x] == 1){
						$form_code .= $first_last;
						$php_code .= $php_first_last;
					}      
					if($code_wanted[$x] == 2){
						$form_code .= $x_company;
						$php_code .= $php_x_company;
					}
					if($code_wanted[$x] == 3){
						$form_code .= $x_address;
						$php_code .= $php_x_address;
					}
					if($code_wanted[$x] == 4){
						$form_code .= $x_ship_address;
						$php_code .= $php_x_ship_address;
					}
					if($code_wanted[$x] == 5){
						$form_code .= $level_3_Fields;
						$php_code .= $php_level_3_Fields;
					}
					if($code_wanted[$x] == 6){
						$php_code .= $php_x_merchant_email;
					}
					if($code_wanted[$x] == 7){
						$form_code .= $x_country;
						$php_code .= $php_x_country;
					}
					if($code_wanted[$x] == 8){
						$form_code .= $x_email;
						$php_code .= $php_x_email;
					}
					if($code_wanted[$x] == 9){
						$form_code .= $x_invoice_num;
						$php_code .= $php_x_invoice_num;
					}
					if($code_wanted[$x] == 10){
						$form_code .= $x_po_num;
						$php_code .= $php_x_po_num;
					}
					if($code_wanted[$x] == 11){
						$form_code .= $x_reference_3;
						$php_code .= $php_x_reference_3;
					}
					if($code_wanted[$x] == 12){
						$form_code .= $x_amount;
						$php_code .= $php_x_amount;
						$php_code .= $php_x_fp_sequence;
						$php_code .= $php_x_fp_timestamp;
						$php_code .= $php_hmac_data;
						$php_code .= $php_x_fp_hash;
					}
					if($code_wanted[$x] == 13){
						$php_code .= $php_x_login;
					}
					if($code_wanted[$x] == 14){
						$php_code .= $php_transaction_key;
					}
					if($code_wanted[$x] == 15){
						$form_code .= $x_recurring_billing_fields;
						$php_code .= $php_x_recurring_billing_fields;
					}
					if($code_wanted[$x] == 20){
						$php_code .= $php_x_logo_url;
					}
					if($code_wanted[$x] == 21){
						$php_code .= $php_x_color_background;
					}
					if($code_wanted[$x] == 22){
						$form_code .= $x_phone;
						$php_code .= $php_x_phone;
					}
					if($code_wanted[$x] == 23){
						$form_code .= $x_fax;
						$php_code .= $php_x_fax;
					}
					if($code_wanted[$x] == 24){
						$form_code .= $x_user1;
						$php_code .= $php_x_user1;
					}
					if($code_wanted[$x] == 25){
						$form_code .= $x_user2;
						$php_code .= $php_x_user2;
					}
					if($code_wanted[$x] == 26){
						$form_code .= $x_user3;
						$php_code .= $php_x_user3;
					}
					if($code_wanted[$x] == 27){
						$form_code .= $x_description;
						$php_code .= $php_x_description;
					}
					if($code_wanted[$x] == 28){
						$php_code .= $php_x_ga_tracking_id;
					}
				}
			}
		}
			//$recurring_option .= htmlspecialchars("</select></td></tr>");
			$form_code .= htmlspecialchars("<tr><td></td><td><div style='text-align:center'><input class='button' type='submit' value='Submit' /></div></tr></td></table>")."\n".htmlspecialchars("</form>");
			$php_code .= htmlspecialchars("?>"." <input type='hidden' name='x_show_form' value='PAYMENT_FORM'/>"."\n". $confirmation_page_bottom ."</div>
</body>
</html>");
			$file_dir = dirname(__FILE__) . '/'; //      this is for servers with the forward / 
			
			$store_xlogin_trans_key .= htmlspecialchars("?>");
			//gives the name of the folder and how to name it
			$plugin_folder_name_with_autosubmit = $file_dir. $confirm_file;
			$plugin_folder_name_with_key = $file_dir. $xlogin_transkey;
			$plugin_folder_name_with_html = $file_dir. $html_file;
			//Puts the file in to the plug-in Folder
			$uniqe_file = file_put_contents( $plugin_folder_name_with_autosubmit, htmlspecialchars_decode( $php_code) );
			$just_xlogin_transkey = file_put_contents( $plugin_folder_name_with_key, htmlspecialchars_decode( $store_xlogin_trans_key) );

			$create_html_form_sc = file_put_contents( $plugin_folder_name_with_html, htmlspecialchars_decode( $form_code ));

			$full_code = "
			<style>
			good {background-color: green;}
			h1   {color: blue;}
			note    {color: white;}
			notice    {background-color: white; color: red;}
			shortcode {font-size: 160%; color: white;}
			</style>
			<good>
			<note>Your HTML has been generated successfully.<br>
			Add this short code to your page or post.<br>
			<shortcode>[Payeeze_GGe4_Form]</shortcode><br>
			</note>
			</good>
			<notice>To test your current generated code. Please click on Current HTML.</notice>
			";
			/* // Post Dump When Testing
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			*/
			return $full_code;
		}

echo get_code();
		} else{
			echo 'This request did not originate from this page or your token has expired'; exit;
		}
	}
?>

<?php
}
?>
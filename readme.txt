=== Global Gateway e4 | Payeezy Gateway | ===

Author: DonnellC 
Version: 2.5
Author URI: http://www.djkidnyce.com
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=94N225YZWHHX2
Contributors: DonnellC
Tags: gge4, hosted payment page, global gateway e4, First Data global gateway e4, gge4 payment page, gge4HCO, gge4 hco, Hosted Checkout, e4, First Data, Payeezy, Payeezy gateway, Payeezy payment page, E-Commerce, eCommerce, Payeezy Recurring, Recurring payments, Recurring payment, Clover Gateway, Clover payment, Clover payments ,Clover Hosted Checkout, Clover HCO, Clover Recurring, Clover, Clover payment page, Clover payment pages, Payeezy is being coming Clover Gateway, Payeezy is Clover Gateway
Requires at least: 3.5
Tested up to: 5.3
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==
This is for Global Gateway e4 | Payeezy Hosted Payment Page. 
Payeezy Made easier for WordPress users to set-up a pay button and much more on their website.
Looking for more customization specific to business needs? 
Contact me. 
== Screenshots ==

1. screenshot1.png
2. screenshot2.png
Once the plug-in is installed and activated. 
3. screenshot3.png
Under the setting tab they will need to click on Global Gateway e4 Hosted Payment Page.
4. screenshot4.png
Next, it will ask for the X Login and Transaction Key which can be found on the hosted payment page.  Next, pick the fields you want displayed. 
Once you select the fields you want displayed, you will need to copy the HTML code.
5. screenshot5.png

== Installation ==

This section describes how to install the plugin and get it working.


1. Upload `Global Gateway e4.zip` to the `/wp-content/plugins/` directory
2. Activate the plug-in through the 'Plug-ins' menu in WordPress
3.You will need to create a hosted payment page in your Global Gateway e4 account. 
4.Once created you want to click on your payment page id.
5.Next click on tap number 8 Hash Calculator. 
6.From there you want to copy the X Login and Transaction Key.
7.Select the field you want to display on your site.
8.Copy the the short-code.
9.Paste the short-code on the page you want to take payment on.

== Changelog ==

= 2.5 =
* Added Google Analytics
* Updated look and feel.
* PHP version 5.2.17 and below will show T_FUNCTION error
* Before installing update. PLEASE download and/or backup your xlogin_transkey and confirm file. "Updates will remove any file in directory"

= 2.0 =
* Before installing update. PLEASE download and/or backup your xlogin_transkey and confirm file. Located YOUR-SITE-HERE/wp-content/plugins/ folder.
* Backup option.
* After backup is created. It will be removed from your server after 30 seconds.
* Updated recurring HTML code.
* Formatted landing page better.
* Added more options for recurring.
* Added option for merchant to select automatic recurring or for customer to select start and end date.
* Added placeholders for all fields.
* Added option to upload PHP and HTML files. 
* Added current HTML page to see current code. 
* Added option to edit HTML code.
* Addressed Parse error: syntax error, unexpected T_FUNCTION.
* Fixed issue where Wordpress removes and breaks code when using the visual tab.
* Removed HTML from main page.
* Tokens will be used in future release.

= 1.1 =
* Added CSRF(Cross-Site Request Forgery) protection  
* Moved Settings page to sidebar.

= 1.0 =
* Added phone number field.
* Added fax number field.
* Added user 1 field.
* Added user 2 field.
* Added user 3 field.
* Added comments field.
* Added the ability to copy the billing address into the Shipping address fields.

= 0.0.6 =
* Updated SHA-1 HMAC code.
* Added the ability to process pre-authorizations.
* Added the ability to pick a color to appear on the hosted payment page.
* Added the ability to enter a Logo URL to be sent to the payment page.
* Added the ability to get a copy of the customer's confirmation email.
* Added a date picker for recurring transactions. 
* Now required fields are working in Google Chrome.
* Updated Recurring 12/07/13. silent update.

= 0.0.5 =
* Fixed mis-keyed code. 

= 0.0.4 =
* The Plug-in now creates 2 files in the plug-in directory. 
	One holding the xlogin and transaction key, the 2nd one only submitting the transaction.
	This is for added for security
* You are now able to view the X Login and Transaction Key from the file.
* Fixed uninstall. When you remove the plug-in, all the file that came with the plug-in will be deleted.
* Made the Amount field  required in the HTML code.

= 0.0.3 =
* Updated plug-in name from Globe Gateway e4 to Global Gateway e4.
* Updated HTML code for better formatting.
* Added screen shots.

= 0.0.2 =
* Updated not be able to send recurring transactions.

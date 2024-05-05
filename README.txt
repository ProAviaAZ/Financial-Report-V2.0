A module for phpVMS to give pilots statistics about airlines
--------------------------------------------------------------

Updated to version 2.0.1
1. Finance.data.class.php - Updated to provide correct pilot pay - added expenses and flight time
2. /core/Finance/Finance.php - Updated phpVMS version and provide feedback if a version change is needed
3. /core/templates/finance/finance.php - Styling changes
4. Updated this README.txt file to reflect above changes

Don't forget to add the following in your skin layout.php file <head> section
	<!-- Parkho Finance 2.0.1 -->
	<script type="text/javascript" src="<?php echo fileurl('lib/js/finance.js');?>"></script>
	<script type="text/javascript" src="<?php echo fileurl('lib/css/finance.css');?>"></script>
	<!-- End Parko Finance 2.0.1 -->


Install:

1. Download repository at Github
2. Upload to your site in folder's order
3. Access it using: [code] <?php echo url('/finance');?> [/code]
4. Include the following path to you skin/layout.php file:
		
			[code] <script type="text/javascript" src="<?php echo fileurl('lib/js/finance.js');?>"></script> [/code]
			[code] <script type="text/javascript" src="<?php echo fileurl('lib/css/finance.css');?>"></script> [/code]

5. Enjoy!

--------------------------------------------------------------

Support:

Use "Contact Me" at my website www.parkho.ir

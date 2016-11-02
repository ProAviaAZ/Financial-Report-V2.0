<h3 style="margin-left: 80px; margin-top: 75px;"><?php echo $title;?></h3>
<div style="border: solid 3px; margin-bottom: 35px; padding: 25px; border-radius: 5px;" class="container">
<link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin6/left.css"></script>
<div style="border-radius: 10px;" class="finance">
 <ul style="text-align:center;">
  <li style="border-radius: 10px;" class="tab_selected">Options</li>
  <li style="border-radius: 10px;" class="tab_selected"><a href="#af">Ailrine</a></li>
  <li style="border-radius: 10px;"><a href="#pf">Pilot</a></li>
 </ul>
 <div style="border-radius: 10px;" class="content_holder">
  <div id="af"><?php Template::show('finance/airline_finance.php');?></div>
  <div id="pf"><?php Template::show('finance/pilot_finance.php');?></div>
 </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://onlinehtmltools.com/tab-generator/skinable_tabs.min.js"></script>
<script type="text/javascript">
$('.finance').skinableTabs({
    effect: 'simple_fade',
    skin: 'skin6',
    position: 'left'
  });
</script>
</div>
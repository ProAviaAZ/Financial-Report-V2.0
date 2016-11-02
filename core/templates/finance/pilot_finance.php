<h3><?php echo $pfname.' '.$plname ;?></h3>
<ul>
	<li>Total Earnings : <?php echo FinanceData::FormatMoney(Auth::$userinfo->totalpay) ;?></li>
	<li>Recent Pay Rate : 
		<strong>
		<?php 
		$pilotid = Auth::$userinfo->pilotid;
		$paid = PIREPData::getLastReports($pilotid, 1);
		echo FinanceData::FormatMoney($paid->pilotpay) ;?> / hr
		</strong>
	</li>
</ul>
<table style="border: solid 1px;">
	<tr style="background: #dddddd; text-transform: uppercase;">
			<td>airline</td>
			<td>gross income</td>
			<td>fuel expense</td>
			<td>flight expense</td>
			<td>flight revenue</td>
	</tr>
<?php 
	$pilotid = Auth::$userinfo->pilotid;
	foreach($airlines as $airline)
		{
			$pgross = PilotFinance::gross_sum($pilotid, $airline->code);
			$pfuel = PilotFinance::fuel_sum($pilotid, $airline->code);
			$prevenue = PilotFinance::revenue_sum($pilotid, $airline->code);
			$pexpense = PilotFinance::expense_sum($pilotid, $airline->code);
?>
	<tr>
		<td><?php echo $airline->name ;?></td>
		<td><?php echo FinanceData::formatMoney($pgross) ;?></td>
		<td><?php echo FinanceData::formatMoney($pfuel) ;?></td>
		<td><?php echo FinanceData::formatMoney($pexpense) ;?></td>
		<td><?php echo FinanceData::formatMoney($prevenue) ;?></td>
	</tr>
<?php
		}
?>
</table>
<?php
$pilotid = Auth::$userinfo->pilotid;
$reports = PilotFinance::last_reports($pilotid);
?>
<h3>Last 5 Flights</h3>
<table style="border: solid 1px;">
	<tr style="background: #dddddd; text-transform: uppercase;">
		<td align="center"><strong>Flight #</strong></td>
		<td align="center"><strong>Duration</strong></td>
		<td align="center"><strong>Pilot Pay</strong></td>
		<td align="center"><strong>Revenue</strong></td>
		<td align="center"><strong>Status</strong></td>
	</tr>
<?php
if(!$reports)
{
?>
	<tr><td align="center" colspan="5">No Flights</td></tr>
<?php
}
else
{
	foreach($reports as $report)
	{	
	
?>
	<tr> 
		<td align="center"><input type="button" onclick="$('#<?php echo $report->pirepid;?>').toggle()" Value="<?php echo $report->code.''.$report->flightnum ;?>" title="Click To View Detail!"></td>
		<td align="center"><?php echo $report->flighttime_stamp ;?></td>
		<td align="center">
		<?php 
			$hours = intval($report->flighttime);
			$minutes = ($report->flighttime - $hours) ;
			$pay = $report->pilotpay ;
			$payhr = ($pay / 60 * $minutes * 100);
			$totpay = ($pay * $hours) + $payhr ;
			echo FinanceData::FormatMoney($totpay) ;?></td>
		<td align="center"><?php echo FinanceData::FormatMoney($report->revenue) ;?></td>
		<?php
			if($report->revenue <= 0)
				{
					echo'<td align="center" style="color: red;">Loss!</td>' ;
				}
			else
				{
					echo'<td align="center" style="color: green;">Profit</td>' ;
				}
		?>
	</tr>
	<tr style="display: none;" id="<?php echo $report->pirepid;?>">
		<td colspan="5">
			<table style="width: 30%; border-spacing:0px; border-collapse:collapse;">
			<tr><td style="padding: 0px;" >Gross Income:</td><td style="padding: 0px;"><font color="green"><?php echo '( '.$report->load.'  @  '.FinanceData::FormatMoney($report->price).' )  =  '.FinanceData::FormatMoney($report->gross) ;?></font></td></tr>
			<tr><td style="padding: 0px;">Fuel Cost:</td><td style="padding: 0px;"><font color="red"><?php echo '( '.$report->fuelused.'  @  '.FinanceData::FormatMoney($report->fuelunitcost).' )  =  ('.FinanceData::FormatMoney($report->fuelprice).')' ;?></font></td></tr>
			<tr><td style="padding: 0px;">Pilot Pay:</td><td style="padding: 0px;"><font color="red">-(<?php echo FinanceData::FormatMoney($report->pilotpay) ;?>)</font></td></tr>
			<tr><td style="padding: 0px;">Expenses:</td><td style="padding: 0px;"><font color="red">-(<?php echo FinanceData::FormatMoney($report->expenses) ;?>)</font></td></tr>
			<tr><td style="padding: 0px;">Total:</td><td style="padding: 0px;"><font color="green"><?php echo FinanceData::FormatMoney($report->revenue) ;?></font></td></tr>
			</table>
		</td>
	</tr>
<?php
	}
}
?>
</table>



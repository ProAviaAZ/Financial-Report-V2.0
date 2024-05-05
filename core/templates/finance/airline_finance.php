<h3>Expenses by Airline</h3>
<table style="border: solid 1px;">
		<tr style="background: #dddddd; text-transform: uppercase;">
				<td>name&nbsp;&nbsp;&nbsp;</td>
				<td>price&nbsp;&nbsp;&nbsp;</td>
				<td>type&nbsp;&nbsp;&nbsp;</td>
		</tr>
<?php 
	if(!$expenses)
	{
		echo'<tr><td colspan="3">No expenses set up at this time</td></tr>';
	}
	else
	{
		foreach($expenses as $expense)
			{
?>
				<tr>
					<td><?php echo $expense->name ;?>&nbsp;&nbsp;&nbsp;</td>
					<td><?php echo FinanceData::formatMoney($expense->cost);?>&nbsp;&nbsp;&nbsp;</td>
					<td>
				<?php
					if($expense->type == "M")
						{
							echo 'Monthly';
						}
					elseif($expense->type == "F")
						{
							echo 'Per Flight';
						}
					elseif($expense->type == "P")
						{
							echo 'Percent (Month)';
						}
					else
						{
							echo 'Percent (Per Flight)';
						}
				?>&nbsp;&nbsp;&nbsp;			
				</td>
			</tr>
<?php
			}
	}
?>
</table>
<br />
<h3>Financial Report by Airline</h3>
<table style="border: solid 1px;">
	<tr style="background: #dddddd; text-transform: uppercase;">
			<td>airline</td>
			<td>gross income</td>
			<td>fuel</td>
			<td>expenses&nbsp;</td>
			<td>pilot pay</td>
			<td>net revenue</td>
			<td>flight time</td>
	</tr>
<?php 
	foreach($airlines as $airline)
		{
			$agross = PilotFinance::airlinegross_sum($airline->code);
			$afuel = PilotFinance::airlinefuel_sum($airline->code);
			$aexpenses = PilotFinance::airlineexpense_sum($airline->code);
	//		$apayrate = PilotFinance::airlinepayrate_sum($airline->code);
			$apilotpay = PilotFinance::airlinepilotpay_sum($airline->code);
			$arevenue = PilotFinance::airlinerevenue_sum($airline->code);
			$aflighttime = PilotFinance::airlineflighttime_sum($airline->code);
?>
	<tr>
		<td><?php echo $airline->name ;?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo FinanceData::formatMoney($agross);?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo FinanceData::formatMoney($afuel); ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo FinanceData::formatMoney($aexpenses); ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo FinanceData::formatMoney($apilotpay);?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo FinanceData::formatMoney($arevenue) ;?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo round ($aflighttime, 1);?>&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<?php
		}
	?>
</table>
<br />
<h3>Financial Report by Pilot</h3>
<div style="border: solid 1px; margin-bottom: 35px; padding: 5px;overflow-y: scroll;overflow-x: hidden;height:250px;">
<table>
	<tr style="background: #dddddd; text-transform: uppercase;">
		<td>Pilot ID&nbsp;&nbsp;&nbsp;</td>
		<td>Pilot Name&nbsp;&nbsp;&nbsp;</td>
		<td>Pilot Pay&nbsp;&nbsp;&nbsp;</td>
		<td>Revenue&nbsp;&nbsp;&nbsp;</td>
		<td>Status&nbsp;&nbsp;&nbsp;</td>
	</tr>
<?php
if(!$pilots)
{
?>
	<tr><td align="center" colspan="4">No Pilots</td></tr>
<?php
}
else
{
	foreach($pilots as $pilot)
	{	
	$pilotcode = PilotData::getPilotCode($pilot->code, $pilot->pilotid);
?>
	<tr> 
		<td><a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>"><?php echo $pilotcode;?></a>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo $pilot->firstname.' '.$pilot->lastname [0] ;?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo FinanceData::FormatMoney($pilot->totalpay) ;?>&nbsp;&nbsp;&nbsp;</td>
		<td>
		<?php 
		$pilotid = $pilot->pilotid ;
		$res = PilotFinance::pilotrevenue_sum($pilotid);
		echo FinanceData::formatMoney($res);
		?>&nbsp;&nbsp;&nbsp;
		</td>
		<?php
			if($res <= "0.00")
				{
					echo'<td style="color: red;">Loss!</td>' ;
				}
			else
				{
					echo'<td style="color: green;">Profit</td>' ;
				}
		
		?>
	</tr>
<?php
	}
}
?>
</table>
</div>





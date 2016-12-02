<h3>all airline expenses</h3>
<table style="border: solid 1px;">
		<tr style="background: #dddddd; text-transform: uppercase;">
				<td>name</td>
				<td>price</td>
				<td>type</td>
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
					<td><?php echo $expense->name ;?></td>
					<td><?php echo FinanceData::formatMoney($expense->cost);?></td>
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
				?>			
				</td>
			</tr>
<?php
			}
	}
?>
</table>
<h3>all airlines financial report</h3>
<table style="border: solid 1px;">
	<tr style="background: #dddddd; text-transform: uppercase;">
			<td>airline</td>
			<td>gross income</td>
			<td>fuel expenses</td>
			<td>pilot pay</td>
			<td>flight revenue</td>
	</tr>
<?php 
	foreach($airlines as $airline)
		{
			$agross = PilotFinance::airlinegross_sum($airline->code);
			$afuel = PilotFinance::airlinefuel_sum($airline->code);
			$arevenue = PilotFinance::airlinerevenue_sum($airline->code);
			$apayrate = PilotFinance::airlinepayrate_sum($airline->code);
?>
	<tr>
		<td><?php echo $airline->name ;?></td>
		<td><?php echo FinanceData::formatMoney($agross);?></td>
		<td><?php echo FinanceData::formatMoney($afuel); ?></td>
		<td><?php echo FinanceData::formatMoney($apayrate);?> / hr</td>
		<td><?php echo FinanceData::formatMoney($arevenue) ;?></td>
	</tr>
	<?php
		}
	?>
</table>
<h3>all pilots financial report</h3>
<div style="border: solid 1px; margin-bottom: 35px; padding: 5px;overflow-y: scroll;overflow-x: hidden;height:250px;">
<table>
	<tr style="background: #dddddd; text-transform: uppercase;">
		<td>Pilot ID</td>
		<td>Pilot Name</td>
		<td>Pilot Pay</td>
		<td>Revenue</td>
		<td>Status</td>
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
		<td><a href="<?php echo url('/profile/view/'.$pilot->pilotid);?>"><?php echo $pilotcode;?></a></td>
		<td><?php echo $pilot->firstname.' '.$pilot->lastname ;?></td>
		<td><?php echo FinanceData::FormatMoney($pilot->totalpay) ;?></td>
		<td>
		<?php 
		$pilotid = $pilot->pilotid ;
		$res = PilotFinance::pilotrevenue_sum($pilotid);
		echo FinanceData::formatMoney($res);
		?>
		</td>
		<?php
			if($res <= "0")
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





<?php
class Finance extends CodonModule    
{
	public function index()	
    {
		// Set phpVMS version number below - works with "phpVMS 5.5.2.72 -- Simpilot/PHP 7.2" or "simpilot 5.5.2" - not tested in other versions
	    	$revision = trim(file_get_contents(CORE_PATH.'/version'));
			if($revision != '5.5.2.72 -- Simpilot/PHP 7.2')
			// if($revision != 'simpilot 5.5.2')
				{
					echo '<center>phpVMS Version Installed Is Not Compatible With This Module!</center><br />';
					echo '<center>phpVMS Version Installed: '.$revision.'</center></br />';
					echo '<center>See ... core/modules/Finance/Finance.php line 6 for info on how to change the phpVMS version</center>';
				}
			else
			{
				$title = 'Financial Report';
				$this->set('title', $title);
				$pilots = PilotFinance::pilots();
				$pilotid = Auth::$userinfo->pilotid;
				$airlines = PilotFinance::airlines();
				$this->set('airlines', $airlines);
				$this->set('pfname', Auth::$userinfo->firstname);
				$this->set('plname', Auth::$userinfo->lastname);
				$this->set('pilots', $pilots);
				$this->set('expenses', PilotFinance::expenses());
				$this->show('/finance/finance.php');
			}
 	}
}	
?>

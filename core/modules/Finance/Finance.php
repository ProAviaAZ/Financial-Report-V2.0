<?php
class Finance extends CodonModule    
{
	public function index()	
    {
		$revision = trim(file_get_contents(CORE_PATH.'/version'));
			if($revision != 'simpilot 5.5.2')
				{
					echo '<center>phpVMS Version Installed Is Not Compatible With This Module!</center><br />';
					echo '<center>phpVMS Version Installed: '.$revision.'</center>';
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
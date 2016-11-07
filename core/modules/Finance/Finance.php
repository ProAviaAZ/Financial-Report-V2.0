<?php
class Finance extends CodonModule    
{
	public function index()	
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
?>
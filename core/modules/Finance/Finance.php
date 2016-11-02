<?php
class Finance extends CodonModule    
{
	
	
	public function index()	
    {
		$start = 0;
		$this->set('start', $start + 5);
		$num_per_page = 5;
        $pilots = PilotFinance::page_pilots($num_per_page, $start);
		$title = 'Financial Report';
		$this->set('title', $title);
		$pilotid = Auth::$userinfo->pilotid;
		$airlines = PilotFinance::airlines();
		$this->set('airlines', $airlines);
		$this->set('pfname', Auth::$userinfo->firstname);
		$this->set('plname', Auth::$userinfo->lastname);
		$this->set('pilots', $pilots);
		$this->set('expenses', PilotFinance::expenses());
		$this->show('/finance/finance.php');
 	}
	
	public function nextpage($start)	
    {
		$this->set('start', $start + 5);
		$num_per_page = 5;
        $pilots = PilotFinance::page_pilots($num_per_page, $start);
		$title = 'Financial Report';
		$this->set('title', $title);
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
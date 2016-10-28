<?php

namespace App\AdminModule\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \App\Presenters\BasePresenter {
	
	/** 
	* @var Model\Tarifs
	* @inject
	*/
	public $tarifs;	
	
	
	protected function startup() {
		parent::startup();
		// definuju do sblony pole s tarifama
		//$this->template->tarifs = $this->tarifs->getTarifs();
	}  
}

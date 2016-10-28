<?php

namespace App\FrontModule\Presenters;

use Nette;
use	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \App\Presenters\BasePresenter {

	/** 
	* @var Model\Tarifs
	* @inject
	*/
	public $tarifs;		
	
	public function beforeRender() {
		parent::beforeRender();
		$this->template->tarifs = $this->tarifs->getTarifs();
	}	
	
}

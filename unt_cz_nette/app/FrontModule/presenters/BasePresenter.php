<?php

namespace App\FrontModule\Presenters;

use Nette;
use	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \App\Presenters\BasePresenter {
	/*public function beforeRender()
	{
		parent::beforeRender();
		$this->template->posts = $this->posts->getPosts($published='true');
	}*/
}

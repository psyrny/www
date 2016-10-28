<?php

namespace App\AdminModule\Presenters;

use Nette,
	App\Model;


class AdminPresenter extends BasePresenter
{
	/** @return Nette\Utils\Paginator */
	//private $paginator;

	public function startup() {
		parent::startup();
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
		//echo $this->presenter;
	}

	/*public function renderDefault($published=null, $currentPage=1)
	{
		$posts = $this->posts->getPosts($published);
		
		//Paginator
		$paginator = new Nette\Utils\Paginator;
		$paginator->setItemCount($posts->count());
		$paginator->setItemsPerPage(10);
		$paginator->setPage($currentPage);

		$this->paginator = $paginator;

		//send to template
		$this->template->posts = $this->posts->getPosts($published, $paginator);
		$this->template->published = $published;
		$this->template->currentPage = $currentPage;
		$this->template->paginator = $paginator;
	}

	//Post actions
	public function handleRemovePost($id)
	{
		if ($id) {
			$removed = $this->posts->removePost($id, $this->user->id);
			$link = $this->link('UndoRemovePost!', array('id' => $id));
			$postTitle =  Strings::truncate($this->posts->getPostTitle($id), 25, '...');

			$this->flashMessage('ÄŚlĂˇnek <small>('.$postTitle.')</small> byl ĂşspĹˇenÄ› smazĂˇn. <a href="'.$link.'" class="ajax">Obnovit ÄŤlĂˇnek</a>', 'success');
			// $this->redirect(':Admin:Admin:default');
			$this->redrawControl();
		}
	}

	public function handleUndoRemovePost($id)
	{
		if ($id) {
			$undo = $this->posts->undoRemovePost($id);
			$postTitle =  Strings::truncate($this->posts->getPostTitle($id), 25, '...');
			
			$this->flashMessage('ÄŚlĂˇnek <small>('.$postTitle.')</small> byl ĂşspĹˇenÄ› obnoven.', 'success');
			// $this->redirect(':Admin:Admin:default');
			$this->redrawControl();
		}
	}
	

	public function renderBackgroundbottom()
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}*/



	/**
	 * Change bg form form factory.
	 * @return Nette\Application\UI\Form
	 */
	/*protected function createComponentChangeBgForm()
	{
		$form = new Nette\Application\UI\Form;

		$form->addUpload('bg', 'ObrĂˇzek pozadĂ­:')
			->setRequired('Vyber obrĂˇzek!');

		
		$form->addSubmit('submit', 'UloĹľit');

		$form->onSuccess[] = array($this, 'changeBgFormFormSucceeded');
		return $form;
	}


	public function changeBgFormFormSucceeded($form)
	{
		// $stop();
		$values = $form->values;

		$image = Image::fromFile($values->bg);
		// $image->sharpen();
		$image->save('uploads/background-bottom.jpg', 100, Image::JPEG);

		$this->flashMessage('SpodnĂ­ pozadĂ­ bylo upraveno.', 'success');
		$this->redirect(':Admin:Admin:default');
	}*/
}

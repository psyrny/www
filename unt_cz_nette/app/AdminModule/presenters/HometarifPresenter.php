<?php
namespace App\AdminModule\Presenters;
use Nette;
use Nette\Application\UI\Form;
/**
 * Description of DashboardPresenter
 *
 * @author Tutin
 */
class HometarifPresenter extends BasePresenter {
	
	
	/** @var Nette\Database\Context */
	private $database;	
	
	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}	
	
	public function startup() {
		parent::startup();
		if (!$this->user->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}  
  
	/**
	 * Ziskame data z modelu a posleme do sablony
	 * Default render view, setting variables to template 
	 * notice: getTarifs is injected in BasePresenter
	 * @return void variables for template
	 * @todo maybe better to call beforeRender
	 * @todo definition of privilegies and roles
	 */
	public function renderDefault() {
		// definuju do sblony pole s tarifama
		$this->template->tarifs = $this->tarifs->getTarifs();
	}
  
	
	/**
	 * Metoda renderuje sablonu edittarif
	 * @param integer $id - id zaznamu tarifu
	 * @return array - radka zaznamu tarifu
	 */
	public function renderEditTarif($id) {
		$this->template->tarif = $this->tarifs->getTarif($id);	
	}	
	
	/** Action je podobna jak render metoda, akction je opravdu pro metody, ktere neco delaji, update, prihlaseni....render jen vykresluje
	 * Action metoda se vola drive nez metoda Render - Action metoda tedy muyze i rozhodnout, aby se zavolala jiná metoda render pomocí příkazu $this->setView('jineView') (zavolá se renderJineView()).
	 * Akce na provolani editace tarifu. Pomoci teto akce muzu predat formulari hodnoty jednotlivych poli
	 * @param integer $idtarif - idecko tarifu, kery chci editovat
	 */
	public function actionEditTarif($id) {
		$id_tarif = $this->database->table($this->tarifs->tbl_tarifs)->get($id);
		if (!$id_tarif) {
			$this->flashMessage("Tarif #$id neexistuje!", "error");
			$this->redirect(':Admin:Hometarif:default');			
			//$this->error('Tarif nebyl nalezen');
		}
		// nactu hodnoty do formulare, abych mohl editovat
		$this['tarifForm']->setDefaults($id_tarif->toArray());		
	}
	
	/**
	 * Signal - nepotrebuje sablonu, provolava se primo v sablone pomoci nazevSignalu! a vypis parametru
	 * V GET je pak ?do = nazev signalu, pripadne dalsi parametry, ktere predam
	 * @param integer $idtarif - idecko tarifu, ziskavam z GET parametru ( n:href="removetarif!  idtarif => $tarif->id")
	 * @return - process removeTarif z modelu
	 */
	public function handleRemoveTarif($id) {
		if ($id) {
			//$this->template->test = $idtarif;
			$this->tarifs->removeTarif($id);
			$this->flashMessage("Tarif smazán.", "success");
			$this->redirect(':Admin:Hometarif:default');			
		}
	}	
	
	
	/**
	 * Skrz tovarnicku vytovrim komponentu formualre pro tarif - vykreslim pak pomoc {control tarifForm} v edittarif.latte
	 * Podle kontroly tarifu pak muzu formular nastavit rovnou s hodnotamy daneho zaznamu, nebo bude prazdny - pridani noveho tarifu
	 * @see tarifFormSucceeded
	 */
	protected function createComponentTarifForm() {
		$form = new Nette\Application\UI\Form;

		$idtarif = $this->getParameter('id');
		
		$form->addText('title', 'Název:')
			->setRequired('Vyplňte název tarifu.');
		$form->addText('perex', 'Perex:')
			->setRequired('Vyplňte perex tarifu.');
		$form->addText('speed','Rychlost:')
			->setRequired('Vyplňte rychlost tarifu.');		
		$form->addText('price','Cena:')
			->setRequired('Vyplňte cenu tarifu.');			
		$form->addCheckbox('home_1', 'Pro panelové domy');
		$form->addCheckbox('home_2', 'Pro rodinné domy');
		$form->addCheckbox('iptv', 'IPTV zdarma');
		
		$form->addSelect('status', 'Status:', $this->tarifs->tarif_statuses);
		$form['status']->setDefaultValue('active');
		
		if ($idtarif) {
			$form->addSubmit('send', 'Upravit tarif');	
		} else {
			$form->addSubmit('send', 'Založit nový tarif');
		}
		
		$form->onSuccess[] = array($this, 'tarifFormSucceeded');
		return $form;
	}	
	
	public function tarifFormSucceeded($form, $values) {
		$idtarif = $this->getParameter('id');
		if ($idtarif) {
			// update tarifu
			$idtarif = $this->database->table($this->tarifs->tbl_tarifs)->get($idtarif);
			$idtarif->update($values);			
			$this->flashMessage('Tarif byl úspěšně upraven', 'success');
		} else {
			// vlozeni noveho tarifu
			$idtarif = $this->database->table($this->tarifs->tbl_tarifs)->insert([
						'title' => $values->title,
						'perex' => $values->perex,
						'speed' => $values->speed,
						'price' => $values->price,
						'home_1'=>$values->home_1,
						'home_2'=>$values->home_2,
						'iptv'=>$values->iptv
					]);			
			$this->flashMessage('Tarif byl úspěšně založen', 'success');
		}
		//$this->redirect('edittarif', $idtarif->id);
		$this->redirect('this');
	}	
	
  /*public function renderShow($id) {
    // získáme data z modelu a předáme do šablony
    $this->template->product = $this->model->getProduct($id);
  }*/  
  
}
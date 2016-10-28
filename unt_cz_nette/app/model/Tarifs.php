<?php

namespace App\Model;

use Nette,
	Nette\Utils\Strings;


/**
 * Tarifs model.
 */
class Tarifs extends Nette\Object {
	
	/** @var Nette\Database\Context */
	private $database;
	public $tbl_tarifs = 'tarifs';
	public $tarif_statuses = array("active"=>"aktivní", "inactive"=>"neaktivní");
	
	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	/**
	 * Get all tarifs from table
	 * @return array tarifs
	 * @author Tutin
	 */
	public function getTarifs() {
		return $this->database->table($this->tbl_tarifs)->order('id ASC');
	}  

	
	/**
	 * Get tarif row
	 * @param int $id tarif id
	 * @return array tarif row
	 * @author Tutin
	 */  
	public function getTarif($id) {
		if($id) {
			return $this->getTarifs()->where('id', $id)->fetchAll();
		}
	}  	
	
	/**
	 * Odstraneni tarifu z db
	 * @param int $id - tarif id
	 * @return void
	 */
	public function removeTarif($id)	{
		if($id) {
			return $this->getTarifs(null)->where('id', $id)->delete();
		}		
	}
	
}
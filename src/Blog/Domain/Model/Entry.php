<?php

namespace App\Blog\Domain\Model;

use Doctrine\ORM\Mapping as ORM;    

/**
* @ORM\Entity
*/
class Entry {
   
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue
	**/
	private $id;
	/** @ORM\Column(type="string",length=100) **/
	private $title;
	/** @ORM\Column(type="text") **/
	private $text;
   
	function __construct($id, $title, $text) {
   	$this->id = $id;
   	$this->title = $title;
   	$this->text = $text;
	}
   
	function getId() {
   	return $this->id;
	}

	function getTitle() {
   	return $this->title;
	}

	function getText() {
   	return $this->text;
	}


	public function __toString() {
   	return "Title: " . $this->title . ". Body: " . $this->text;
	}


}

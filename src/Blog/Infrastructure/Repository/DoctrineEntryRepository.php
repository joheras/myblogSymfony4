<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Model\Entry;
use App\Blog\Domain\Repository\IEntryRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineEntryRepository extends ServiceEntityRepository implements IEntryRepository {
   
	private $em;
   
	public function __construct(EntityManagerInterface $em) {
   	   $this -> em = $em;
	}
   
	public function findAll() : array {
   	   $dql = 'SELECT e FROM App\Blog\Domain\Model\Entry e';
   	   $consulta = $this -> em ->createQuery($dql);
   	   return $consulta ->getResult();
	}

	public function findEntryByID(int $id) : Entry {
  	    $dql = 'SELECT e FROM App\Blog\Domain\Model\Entry e WHERE e.id = :id';
    	    $consulta = $this->em->createQuery($dql);
    	    $consulta ->setParameter('id', $id);
    	    return $consulta->getOneOrNullResult();
	}

	public function removeEntry(Entry $entry) {
  	     $this -> em->remove($entry);
            $this -> em ->flush();
	}

	public function saveEntry(Entry $entry) {
  	     $this->em->persist($entry);
            $this->em->flush();
	}
}

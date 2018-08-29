<?php
namespace App\Blog\Domain\Repository;

use App\Blog\Domain\Model\Entry;


interface IEntryRepository {
    
    public function findEntryByID(int $id) : Entry;
    public function findAll() : array;
    public function saveEntry(Entry $entry);
    public function removeEntry(Entry $entry);
    
}


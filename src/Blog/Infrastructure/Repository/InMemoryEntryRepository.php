<?php
namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Repository\IEntryRepository;
use App\Blog\Domain\Model\Entry;

class InMemoryEntryRepository implements IEntryRepository
{

    private $entries;
    
    public function __construct() {
        $this ->entries[] = new Entry(1,"Primera entrada", "Esta es la primera entrada");
        $this ->entries[] = new Entry(2,"Segunda entrada", "Esta es la segunda entrada");
    }
    
    public function findAll() : array {
        return $this ->entries;
    }
    
    public function findEntryByID(int $id) : Entry {
        foreach ($this->entries as $entry){
            if($entry->getId()==$id){
                return $entry;
            }   
        }
        return Null;
    }
    
    public function removeEntry(Entry $entry) {
        foreach ($this->entries as $key => $value) {
            if ($value->getId() == $entry>getId()) {
                unset($this->entries[$key]);
            }
        }
    }
    
    public function saveEntry(Entry $entry) {
        $this ->entries[] = $entry;
    }
    
}


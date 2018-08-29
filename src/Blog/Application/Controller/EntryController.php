<?php

namespace App\Blog\Application\Controller;
use App\Blog\Domain\Repository\IEntryRepository;
use Symfony\Component\HttpFoundation\Response;

class EntryController
{
    
    private $entryrepository;
    
    public function __construct(IEntryRepository $entryrepository){
        $this->entryrepository = $entryrepository;
    }
    
    public function showAll()
    {
        $entries = $this -> entryrepository -> findAll();
                 return new Response(implode("<br/>", $entries));
    }
}

<?php

namespace App\Blog\Application\Controller;
use App\Blog\Domain\Repository\IEntryRepository;
use Symfony\Component\HttpFoundation\Response;

class EntryController 
{
    
    private $entryrepository;
    private $twig;
    
    public function __construct(\Twig_Environment $twig, IEntryRepository $entryrepository){
        $this->entryrepository = $entryrepository;
        $this->twig=$twig;
    }
    
    public function showAll()
    {
        $entries = $this -> entryrepository -> findAll();
        return new Response($this->twig->render("@blog/entradas.html.twig",array('entries'=> $entries)));
    }
}

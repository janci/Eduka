<?php
namespace Eduka\Paginator;

/**
 * Description of Paginator
 * @author Švantner Ján <janci@janci.net>
 * @copyright Copyright (c) 2011, Švantner Ján <janci@janci.net>
 */
class Paginator implements \Iterator {
    private $pagObject;
    private $itemsPerPage;
    private $page;
    /** @var \IPaginatable */
    private $current_item;
    
    public function __construct(IPaginatable $object, $itemsPerPage, $page=1){
        $this->itemsPerPage = $itemsPerPage;
        $this->page = $page;
        $this->pagObject = $object;
        $this->current_item = ($page-1)*$itemsPerPage+1;
    }
    
    public function current() {
        return $this->pagObject->getItem($this->current_item);
    }
    
    public function key() {
        return $this->current_item;
    }
    
    public function next() {
        $this->current_item++;
    }
    
    public function rewind() {
        $this->current_item = ($this->page-1)*$this->itemsPerPage+1;;
    }
    
    public function valid() {
        return $this->current_item<=$this->pagObject->getCount();
    }
    
}



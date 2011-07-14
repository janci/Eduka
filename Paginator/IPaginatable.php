<?php
/**
 * Interface for using on class what is paginatable
 * @author Švantner Ján <janci@janci.net>
 */
interface IPaginatable {
    public function getItem($number);
    
    public function getCount();
}


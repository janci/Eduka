<?php
namespace Eduka\Portal;
/**
 *
 * @author Švantner Ján <janci@janci.net>
 */
interface ITranslator {
    
    public function translate($string, int $count = NULL );
}


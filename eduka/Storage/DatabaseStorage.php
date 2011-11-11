<?php
namespace Eduka\Storage;
class DatabaseStorage
{
    private $table;
    public function __construct($storage_name) {
        $this->table = $storage_name;
    }
}
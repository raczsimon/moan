<?php
namespace App\Controller;

class MasterController
{
        protected $master;
        public $template;

        public function __construct()
        {
            $this->template = (object) array();
        }
}

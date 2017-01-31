<?php
namespace App\Component;

class MasterComponent
{
        public function renderTemplate($child, $templateName)
        {
                $classname = str_replace('\\Driver', '', get_class($child));
                return file_get_contents(str_replace('\\', '/', $classname) . '/templates/' . $templateName . '.phtml');
        }
}

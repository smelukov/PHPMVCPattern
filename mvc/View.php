<?php
namespace MVC

abstract class View 
{
    protected $_template;
    
    function __construct ($template)
    {
        $this->_template = $template;
    }
    
    function generate ($data)
    {
        extract($data);
        require_once "{$_SERVER['DOCUMENT_ROOT']}/templates/$this->_template";
    }
}

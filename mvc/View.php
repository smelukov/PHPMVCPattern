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
        $filename = sprintf("../templates/%s.php", $this->_template);
        if(!is_readable($filename)){
            throw new DomainException(sprintf("%s does not exists", $filename));
        }
        require_once $filename;
    }
}

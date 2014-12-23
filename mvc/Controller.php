<?php
namespace MVC

abstract class Controller {
    /** @var  View */
    protected $_view;
    /** @var  Model */
    protected $_model;
    
    function __construct (Model $model, View $view)
    {
        $this->_model = $model;
        $this->_view  = $view;
    }
    
    function action ()
    {
        $this->_view->generate($this->_model->getData());
    }
    
    /**
     * @return Model
     */
    public function getView ()
    {
        return $this->_view;
    }
    
    /**
     * @return View
     */
    public function getModel ()
    {
        return $this->_model;
    }
}

<?php

abstract class Model {
    abstract function getData ();
}

abstract class Controller {
    /** @var  View */
    protected $_view;
    /** @var  Model */
    protected $_model;

    function __construct ($model, $view)
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

abstract class View {
    protected $_template = '';

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

class MainModel extends Model {
    function getData ()
    {
        return [
            'var1' => 'content 1',
            'var2' => 'content 2'
        ];
    }
}

class MainController extends Controller {
}

class MainView extends View {
}

$controller = new MainController(new MainModel(), new MainView('index.php'));
$controller->action();

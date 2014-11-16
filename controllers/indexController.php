<?php
/* 
 * Контроллер по умолчанию
 */

class indexController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_view->title = 'Paton Systems';
        $this->_view->rendering('index', 'home');
    }
}
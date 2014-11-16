<?php
class pageController extends Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->_view->title = 'Page';
        $this->_view->rendering('index', 'page');
    }
}
<?php
class View {
    private $_controller;
    
    public function __construct(Request $handling) {
        $this->_controller = $handling->getController();
    }
    
    public function rendering($view, $item = FALSE) {
        $menu = array (
            array (
                'id' => 'home',
                'title' => 'Homepage',
                'link' => BASE_URL
            ),
            array (
                'id' => 'page',
                'title' => 'Test Page',
                'link' => BASE_URL . 'page'
            )
        );
        
        
        $rootView = ROOT . 'views' . DS . $this->_controller . DS . $view . '.phtml';
        
        if (is_readable($rootView)) {
            $_layoutParams = array(
                'root_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
                'root_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
                'root_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
                'menu' => $menu
            );
            
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rootView;
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } else {
            throw new Exception($rootView. ' is not found');
        }
    }
}
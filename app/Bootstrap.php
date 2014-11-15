<?php
/* 
 * Класс позволяет выполнять подключение файлов контроллеров 
 * по принятому из класса Request параметру $handling->getController()
 */

class Bootstrap {
    public static function run(Request $handling) {
        $controllerName = $handling->getController() . 'Controller';
        $rootController = ROOT . 'controllers' . DS . $controllerName . '.php';
        $method = $handling->getMethod();
        $args = $handling->getArgs();
                
        if (is_readable($rootController)) {
            require_once $rootController;
            $controller = new $controllerName;
            
            if (is_callable(array($controller, $method))) {
                $method = $handling->getMethod();
            } else {
                $method = 'index';
            }
            
            if (isset($args)) {
                call_user_func_array(array($controller, $method), $args);
                /* Вызывает функцию $controller->$method 
                с массивом параметров $handling->getArgs() */
            } else {
                call_user_func(array($controller, $method));
                // Вызывает функцию $controller->$method
            }
        } else {
            throw new Exception($controllerName. ' is not found');
        }
    }
}
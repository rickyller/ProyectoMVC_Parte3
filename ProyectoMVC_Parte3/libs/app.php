<?php
    require_once 'controllers/errores.php';
    
    class App{
    
        function __construct()
        {
            
            
            //obtenemos la URL que viene en el navegador o si viene vacio 
            $url = isset($_GET['url']) ? $_GET['url']: null;
            $url =  rtrim($url, '/');   //quitamos los '/' que esten de mas al final de la cadena url
            $url = explode('/', $url);  //dividimos la cadena $url separada por '/'
            
            //Cuando se ingresa sin definir un controlador 
            if (empty($url[0])){
                $archivoController = 'controllers/login.php';
                require_once $archivoController;
                $controller = new Login();
                //Cargamos el modelo "login"
                $controller->loadModel('login');
                $controller->render();
                
                return false;
            }
            
            $archivoController = 'controllers/'.$url[0].'.php'; //El objeto principal 
            
            if(file_exists($archivoController))
            {
                require_once $archivoController;
    
                // inicializar controlador
                $controller = new $url[0];
                $controller->loadModel($url[0]);
    
                // si hay un método que se requiere cargar
                if(isset($url[1])){
                    if(method_exists($controller, $url[1]))
                    {
                        if(isset($url[2])){
                            //el método tiene parámetros
                            //sacamos e # de parametros
                            $nparam = sizeof($url) - 2;
                            //crear un arreglo con los parametros
                            $params = [];
                            //iterar
                            for($i = 0; $i < $nparam; $i++){
                                array_push($params, $url[$i + 2]);
                            }
                            //pasarlos al metodo   
                            $controller->{$url[1]}($params);
                        }else{
                            $controller->{$url[1]}();    
                        }
                    }else{
                        $controller = new Errores(); 
                    }
                }else{
                    $controller->render();
                }
            }else{
                $controller = new Errores();
            }
        }
    }
?>
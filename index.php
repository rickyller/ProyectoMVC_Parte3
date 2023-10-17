<?php
    
    //Carga las configuraciones principales 
    require_once 'config.php';
  
    //Establecemoslas librerias para cargar los controllers, las vistas y app.
    
    require_once 'libs/database.php';
    require_once 'libs/messages.php';
    
    require_once 'libs/controller.php';
    require_once 'libs/view.php';
    require_once 'libs/model.php';
    require_once 'libs/app.php';
    
    require_once 'classes/session.php';
    require_once 'classes/sessionController.php';
    require_once 'classes/errors.php';
    require_once 'classes/success.php';
    
    include_once 'models/usermodel.php';
    include_once 'models/expensesmodel.php';
    include_once "models/categoriesmodel.php";
    include_once "models/joinexpensescategoriesmodel.php";
    
    //Creamos el objeto con el nombre de la url ...
    $app =  new App();

?>
<?php
    class IndexU extends Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "Error al cargar el recurso X.";
            $this->view->render('indexU');
        }
    }
?>
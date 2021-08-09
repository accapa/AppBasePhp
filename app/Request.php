<?php
/**
 * Copyright (c) 2020. Ministerio de Defensa
 * Created by IntelliJ IDEA.
 * User: accapa
 * Date: 22/11/2020 11:26 AM
 */

namespace App;

class Request
{
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    
    public function __construct() {
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);  // elimina los elementos vacios

            $this->_controlador = strtolower(array_shift($url));
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;
        }
        
        if(!$this->_controlador){
            $this->_controlador = "index";
        }
        
        if(!$this->_metodo){
            $this->_metodo = 'index'; 
        }
        
        if(!isset($this->_argumentos)){
            $this->_argumentos = [];
        }
    }
    
    public function getControlador()
    {
        return $this->_controlador;
    }
    
    public function getMetodo()
    {
        return $this->_metodo;
    }
    
    public function getArgs()
    {
        return $this->_argumentos;
    }
}

<?php

namespace Conf;

class ConfigController
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;

    public function __construct()
    {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //var_dump($this->url);
            $this->urlArray = explode("/", $this->url);
            //var_dump($this->urlArray);

            if ((isset($this->urlArray[0])) and (isset($this->urlArray[1]))) {
                $this->urlController = $this->urlArray[0];
                $this->urlMetodo = $this->urlArray[1];
            } else {
                $this->urlController = "erro";
                $this->urlMetodo = "index";
            }
        } else {
            $this->urlController = "home";
            $this->urlMetodo = "index";
        }

     echo "Controller: {$this->urlController} - Método: {$this->urlMetodo} <br>";
     
    }

    public function loadpage()
    {
        $urlController = ucwords($this->urlController);
        //echo "Carregar a pagina/Controller <br>";
        $classLoad = "\\Controllers\\" . $urlController;
       // echo $classLoad . "<br>";
        $classPage= new $classLoad();
        $classPage->index();
    }
}
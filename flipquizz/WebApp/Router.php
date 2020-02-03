<?php
//verifier


//http://flipquizz.crm/question/1/update
//http://flipquizz.crm/index.php?url=questions/1/update

//controller/id/action

// array(
//     0=>controler
//     1=>identifiant
//     2=>action
// )   

/**
 * get      = afficahge de la liste des éléments
 * get/id   = affichage d'un élément
 * post     = ajout d'un élément
 * put      = mise à jour d'un élément
 * delete   = suppresion d'un element
 */
class Router
{
    protected $controller;
    
    protected $id;
    
    protected $action;

    public function __construct()
    {
        /*if(!empty($_GET['url']))
        {
            $url = explode('/', $_GET['url']);
        }
        else
        {
            $url = ['home',0,'get'];
        }*/

        $url = !empty($_GET['url']) ? explode('/', $_GET['url']) : ['home', 0, 'get'];

        //?? si il nexiste pas prend la valeur par default un racourcis sur ternaire null coalescing operatin
        $this->controller =basename( $url[0] ?? 'home');

        //$this->controller = !empty($url[0]) ? $url[0] : 'home';

        $this->id = intval($url[1] ?? 0);

        //basename on garde la derniere partie d'url duble securite
        $this->action =basename($url[2] ?? 'get');

    }


}
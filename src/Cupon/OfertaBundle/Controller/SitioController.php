<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller
{
    /**
     * Ruta genérica para páginas estáticas.
     *
     * @param $pagina
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function estaticaAction($pagina)
    {
        return $this->render('OfertaBundle:Sitio:' . $pagina . '.html.twig');
    }
}

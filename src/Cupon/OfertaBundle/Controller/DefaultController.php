<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{

    public function portadaAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            //'ciudad' => 1,
            'id' => 1,
            //'fecha_publicacion' => new \DateTime('today')
        ));

        /*echo '<pre>';
        var_dump($oferta);
        die;*/

        return $this->render(
            'OfertaBundle:Default:portada.html.twig',
            array('oferta' => $oferta)
        );
    }
}

<?php

namespace Cupon\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('CiudadBundle:Default:index.html.twig', array('name' => $name));
    }

    public function cambiarAction($ciudad)
    {
        return new RedirectResponse($this->generateUrl(
            'portada',
            array(
            'ciudad' => $ciudad
        )));
    }

    public function listaCiudadesAction($ciudad)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $ciudades = $em->getRepository('CiudadBundle:Ciudad')->findAll();

        return $this->render(
            'CiudadBundle:Default:listaCiudades.html.twig',
            array(
                'ciudadActual' => $ciudad,
                'ciudades' => $ciudades
            )
        );
    }
}

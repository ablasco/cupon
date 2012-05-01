<?php

namespace Cupon\TiendaBundle\Entity;

/** @ORM\Entity */
class Tienda
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** @ORM\Column(type="string", lenght=100) */
    protected $nombre;

    /** @ORM\Column(type="string", lenght=100) */
    protected $slug;

    /** @ORM\Column(type="string", lenght=10) */
    protected $login;

    /** @ORM\Column(type="string", lenght=255) */
    protected $password;

    /** @ORM\Column(type="string", lenght=255) */
    protected $salt;

    /** @ORM\Column(type="text") */
    protected $descripcion;

    /** @ORM\Column(type="text") */
    protected $direccion;

    /** @ORM\ManyToOne(targetEntity="Cupon\CiudadBundle\Entity\Ciudad") */
    protected $ciudad;

}
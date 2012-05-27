<?php

namespace Cupon\UsuarioBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use Symfony\Component\Validator\ExecutionContext;

/**
 * Cupon\UsuarioBundle\Entity\Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cupon\UsuarioBundle\Entity\UsuarioRepository")
 * @DoctrineAssert\UniqueEntity("email")
 * @Assert\Callback(methods={"esDniValido"})
 */
class Usuario implements UserInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     * @Assert\NotBlank(message = "Por favor, escribe tu nombre")
     */
    private $nombre;

    /**
     * @var string $apellidos
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $apellidos;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\MinLength(6)
     */
    private $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="text")
     * @Assert\MinLength(limit = 5, message = "La dirección debería tener {{ limit }}
      caracteres o más para considerarse válida")
     */
    private $direccion;

    /**
     * @var boolean $permite_email
     *
     * @ORM\Column(name="permite_email", type="boolean")
     */
    private $permite_email;

    /**
     * @var \DateTime $fecha_alta
     *
     * @ORM\Column(name="fecha_alta", type="datetime")
     */
    private $fecha_alta;

    /**
     * @var \DateTime $fecha_nacimiento
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fecha_nacimiento;

    /**
     * @var string $dni
     *
     * @ORM\Column(name="dni", type="string", length=9)
     */
    private $dni;

    /**
     * @var string $numero_tarjeta
     *
     * @ORM\Column(name="numero_tarjeta", type="string", length=20)
     */
    private $numero_tarjeta;

    /**
     * @var string $ciudad
     *
     * @ORM\ManyToOne(targetEntity="Cupon\CiudadBundle\Entity\Ciudad")
     */
    private $ciudad;


    public function __construct()
    {
        $this->fecha_alta = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set permite_email
     *
     * @param boolean $permiteEmail
     */
    public function setPermiteEmail($permiteEmail)
    {
        $this->permite_email = $permiteEmail;
    }

    /**
     * Get permite_email
     *
     * @return boolean 
     */
    public function getPermiteEmail()
    {
        return $this->permite_email;
    }

    /**
     * Set fecha_alta
     *
     * @param \DateTime $fechaAlta
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fecha_alta = $fechaAlta;
    }

    /**
     * Get fecha_alta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    /**
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set dni
     *
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set numero_tarjeta
     *
     * @param string $numeroTarjeta
     */
    public function setNumeroTarjeta($numeroTarjeta)
    {
        $this->numero_tarjeta = $numeroTarjeta;
    }

    /**
     * Get numero_tarjeta
     *
     * @return string 
     */
    public function getNumeroTarjeta()
    {
        return $this->numero_tarjeta;
    }

    /**
     * Set ciudad
     *
     * @param object $ciudad
     */
    public function setCiudad(\Cupon\CiudadBundle\Entity\Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * Get ciudad
     *
     * @return object
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function __toString()
    {
        return $this->getNombre() . ' ' . $this->getApellidos();
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    function getRoles()
    {
        return array('ROLE_USUARIO');
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     *
     * @return void
     */
    function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Returns whether or not the given user is equivalent to *this* user.
     *
     * The equality comparison should neither be done by referential equality
     * nor by comparing identities (i.e. getId() === getId()).
     *
     * However, you do not need to compare every attribute, but only those that
     * are relevant for assessing whether re-authentication is required.
     *
     * @param UserInterface $user
     *
     * @return Boolean
     */
    function equals(UserInterface $user)
    {
        return $this->email == $user->getEmail();
    }

    /**
     * @Assert\True(message = "Debes tener al menos 18 años")
     */
    public function isMayorDeEdad()
    {
        return $this->fecha_nacimiento <= new \DateTime('today - 18 years');
    }


    public function esDniValido(ExecutionContext $context)
    {
        $nombrePropiedad = $context->getPropertyPath() . '.dni';
        $dni = $this->getDni();
        $errorFormato = 'El DNI introducido no tiene el formato correcto '.
            '(entre 1 y 8 números seguidos de una letra, sin guiones y sin dejar ningún espacio en blanco)';
        $errorAlgoritmo = 'La letra no coincide con el número del DNI.'.
            'Comprueba que has escrito bien tanto el número como la letra';

        // Comprobar que el formato sea correcto
        if (0 === preg_match("/\d{1,8}[a-z]/i", $dni)) {
            $context->setPropertyPath($nombrePropiedad);
            $context->addViolation($errorFormato, array(), null);
            return;
        }

        // Comprobar que la letra cumple con el algoritmo
        $numero = substr($dni, 0, -1);
        $letra = strtoupper(substr($dni, -1));
        $letraValida = substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($numero, "XYZ", "012") % 23, 1);
        if ($letra != $letraValida) {
            $context->setPropertyPath($nombrePropiedad);
            $context->addViolation($errorAlgoritmo, array(), null);
        }

    }
}
<?php

namespace Cupon\TiendaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TiendaRepository extends EntityRepository
{
    public function findUltimasOfertasPublicadas($tiendaId, $limite = 10)
    {
        $em = $this->getEntityManager();
        $dql = 'SELECT o, t FROM OfertaBundle:Oferta o
                JOIN o.tienda t
                WHERE o.revisada = true
                AND o.fecha_publicacion < :fecha
                AND o.tienda = :id
                ORDER BY o.fecha_expiracion DESC';

        $consulta = $em->createQuery($dql);
        $consulta->setMaxResults($limite);
        $consulta->setParameter('id', $tiendaId);
        $consulta->setParameter('fecha', new \DateTime('now'));

        return $consulta->getResult();
    }

    public function findCercanas($tienda, $ciudad)
    {
        $em = $this->getEntityManager();
        $dql = 'SELECT t, c FROM TiendaBundle:Tienda t
                JOIN t.ciudad c
                WHERE c.slug = :ciudad
                AND t.slug != :tienda';

        $consulta = $em->createQuery($dql);
        $consulta->setMaxResults(5);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setParameter('tienda', $tienda);

        return $consulta->getResult();
    }
}
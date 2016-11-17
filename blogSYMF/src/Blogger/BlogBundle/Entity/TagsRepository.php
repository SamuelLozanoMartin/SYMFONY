<?php
// src/Blogger/BlogBundle/Entity/TagsRepository.php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 * Esta clase fue generada por el ORM de Doctrine. Abajo añade
 * tu propia personalización a los métodos del repositorio.
 */
class TagsRepository extends EntityRepository
{
    public function getTags($limit = null, $blog_name)
    {
      echo ($blog_name);
        $blogTags = $this->createQueryBuilder('b')
                     ->select('b.tags')
                     ->where('b.id LIKE :id')
                     ->setParameter('id', '%'.$blog_name.'%')
                     ->getQuery()
                     ->getResult();
        return $blogTags;
    }
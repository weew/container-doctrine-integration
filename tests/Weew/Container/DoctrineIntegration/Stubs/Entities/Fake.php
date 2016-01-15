<?php

namespace Tests\Weew\Container\DoctrineIntegration\Stubs\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity(repositoryClass="Tests\Weew\Container\DoctrineIntegration\Stubs\Repositories\FakeRepository")
 */
class Fake {
    /**
     * @var int
     *
     * @Id()
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    private $id;
}

<?php

namespace Tests\Weew\Container\DoctrineIntegration\Stubs\Repositories;

use Doctrine\ORM\EntityRepository;

class FakeRepository extends EntityRepository {
    public function __construct() {}
}

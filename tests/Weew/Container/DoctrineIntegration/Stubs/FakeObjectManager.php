<?php

namespace Tests\Weew\Container\DoctrineIntegration\Stubs;

use Doctrine\Common\Persistence\ObjectManager;
use Tests\Weew\Container\DoctrineIntegration\Stubs\Repositories\FakeRepository;

class FakeObjectManager implements ObjectManager {
    public function getRepository($className) {
        return new FakeRepository();
    }

    public function find($className, $id) {}
    public function persist($object) {}
    public function remove($object) {}
    public function merge($object) {}
    public function clear($objectName = null) {}
    public function detach($object) {}
    public function refresh($object) {}
    public function flush() {}
    public function getClassMetadata($className) {}
    public function getMetadataFactory() {}
    public function initializeObject($obj) {}
    public function contains($object) {}
}


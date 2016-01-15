<?php

namespace Tests\Weew\Container\DoctrineIntegration;

use PHPUnit_Framework_TestCase;
use Tests\Weew\Container\DoctrineIntegration\Stubs\FakeObjectManager;
use Tests\Weew\Container\DoctrineIntegration\Stubs\Repositories\FakeRepository;
use Weew\Container\Container;
use Weew\Container\DoctrineIntegration\DoctrineRepositoriesLoader;
use Weew\Container\DoctrineIntegration\Exceptions\RepositoryNotFoundException;
use Weew\Container\Exceptions\ValueNotFoundException;

class DoctrineRepositoriesLoaderTest extends PHPUnit_Framework_TestCase {
    public function test_create() {
        new DoctrineRepositoriesLoader(
            new Container(), new FakeObjectManager()
        );
    }

    public function test_get_repository() {
        $loader = new DoctrineRepositoriesLoader(
            new Container(), new FakeObjectManager()
        );
        $repository = $loader->getRepository(FakeRepository::class);
        $this->assertTrue($repository instanceof FakeRepository);
    }

    public function test_get_invalid_repository() {
        $loader = new DoctrineRepositoriesLoader(
            new Container(), new FakeObjectManager()
        );

        $this->setExpectedException(RepositoryNotFoundException::class);
        $loader->getRepository('foo');
    }

    public function test_get_invalid_repository_without_loader() {
        $container = new Container();

        $this->setExpectedException(ValueNotFoundException::class);
        $container->get('FooRepository');
    }

    public function test_get_invalid_repository_with_loader() {
        $container = new Container();
        $om = new FakeObjectManager();
        $loader = new DoctrineRepositoriesLoader($container, $om);
        $loader->enable();

        $this->setExpectedException(RepositoryNotFoundException::class);
        $container->get('FooRepository');
    }

    public function test_get_repository_with_loader() {
        $container = new Container();
        $om = new FakeObjectManager();
        $loader = new DoctrineRepositoriesLoader($container, $om);
        $loader->enable();

        $repository = $container->get(FakeRepository::class);
        $this->assertTrue($repository instanceof FakeRepository);

        $anotherRepository = $container->get(FakeRepository::class);
        $this->assertTrue($repository === $anotherRepository);
    }
}

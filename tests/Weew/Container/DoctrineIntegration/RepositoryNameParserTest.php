<?php

namespace Tests\Weew\Container\DoctrineIntegration;

use PHPUnit_Framework_TestCase;
use Tests\Weew\Container\DoctrineIntegration\Stubs\Entities\Fake;
use Tests\Weew\Container\DoctrineIntegration\Stubs\Repositories\FakeRepository;
use Weew\Container\DoctrineIntegration\RepositoryNameParser;

class RepositoryNameParserTest extends PHPUnit_Framework_TestCase {
    public function test_convert_repository_name_to_entity_name() {
        $parser = new RepositoryNameParser();
        $this->assertEquals(
            Fake::class,
            $parser->convertRepositoryNameToEntityName(FakeRepository::class)
        );
    }

    public function test_repository_name_pattern() {
        $parser = new RepositoryNameParser();
        $this->assertTrue(
            preg_match($parser->getRepositoryNamePattern(), 'Foo/BarRepository') === 1
        );
    }
}

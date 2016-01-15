<?php

namespace Weew\Container\DoctrineIntegration;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use Weew\Container\DoctrineIntegration\Exceptions\RepositoryNotFoundException;
use Weew\Container\IContainer;

class DoctrineRepositoriesLoader implements IDoctrineRepositoriesLoader {
    /**
     * @var IContainer
     */
    protected $container;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var IRepositoryNameParser
     */
    protected $repositoryNameParser;

    /**
     * DoctrineRepositoriesLoader constructor.
     *
     * @param IContainer $container
     * @param ObjectManager $objectManager
     * @param IRepositoryNameParser|null $repositoryNameParser
     */
    public function __construct(
        IContainer $container,
        ObjectManager $objectManager,
        IRepositoryNameParser $repositoryNameParser = null
    ) {
        if ( ! $repositoryNameParser instanceof IRepositoryNameParser) {
            $repositoryNameParser = $this->createRepositoryNameParser();
        }

        $this->container = $container;
        $this->objectManager = $objectManager;
        $this->repositoryNameParser = $repositoryNameParser;
    }

    /**
     * @return mixed
     */
    public function enable() {
        $this->container->set(
            $this->repositoryNameParser->getRepositoryNamePattern(),
            [$this, 'getRepository']
        )->singleton();
    }

    /**
     * @param $abstract
     *
     * @return EntityRepository
     * @throws RepositoryNotFoundException
     */
    public function getRepository($abstract) {
        $entityClass = $this->repositoryNameParser
            ->convertRepositoryNameToEntityName($abstract);

        if ( ! class_exists($entityClass)) {
            throw new RepositoryNotFoundException(s(
                'Could not find repository "%s", ' .
                'with derived entity class "%s".',
                $abstract, $entityClass
            ));
        }

        return $this->objectManager->getRepository($entityClass);
    }

    /**
     * @return IRepositoryNameParser
     */
    protected function createRepositoryNameParser() {
        return new RepositoryNameParser();
    }
}

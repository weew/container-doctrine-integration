<?php

namespace Weew\Container\DoctrineIntegration;

class RepositoryNameParser implements IRepositoryNameParser {
    /**
     * @param $repositoryName
     *
     * @return string
     */
    public function convertRepositoryNameToEntityName($repositoryName) {
        return str_replace(
            ['Repositories', 'Repository'], ['Entities', ''], $repositoryName
        );
    }

    /**
     * @return string
     */
    public function getRepositoryNamePattern() {
        return '/Repository$/';
    }
}

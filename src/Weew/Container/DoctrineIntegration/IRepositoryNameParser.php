<?php

namespace Weew\Container\DoctrineIntegration;

interface IRepositoryNameParser {
    /**
     * @param $repositoryName
     *
     * @return string
     */
    function convertRepositoryNameToEntityName($repositoryName);

    /**
     * @return string
     */
    function getRepositoryNamePattern();
}

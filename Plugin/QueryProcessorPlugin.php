<?php
/**
 * @category    ScandiPWA
 * @package     ScandiPWA_GraphQl
 * @author      scandiweb <info@scandiweb.com>
 * @copyright   Copyright (c) 2021 Scandiweb, Ltd (https://scandiweb.com)
 */
declare(strict_types=1);

namespace ScandiPWA\CustomGraphQlQueryLimiter\Plugin;

use GraphQL\Validator\Rules\QueryComplexity;
use Magento\Framework\GraphQl\Query\QueryComplexityLimiter;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Schema;

class QueryProcessorPlugin
{
    /**
     * @var QueryComplexityLimiter
     */
    protected $queryComplexityLimiter;

    /**
     * QueryProcessorPlugin constructor.
     * @param QueryComplexity $queryComplexityLimiter
     */
    public function __construct(
        QueryComplexity $queryComplexityLimiter
    ) {
        $this->queryComplexityLimiter = $queryComplexityLimiter;
    }

    /**
     * @param Schema $schema
     * @param string $source
     * @param ContextInterface|null $contextValue
     * @param array|null $variableValues
     * @param string|null $operationName
     * @return array
     */
    public function beforeProcess(
        Schema $schema,
        string $source,
        ContextInterface $contextValue = null,
        array $variableValues = null,
        string $operationName = null
    ) {
        // Set query complexity without checking for production mode
        $this->queryComplexityLimiter->execute();

        return [$schema, $source, $contextValue, $variableValues, $operationName];
    }
}

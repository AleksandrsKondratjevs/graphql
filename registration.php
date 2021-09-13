<?php
/**
 * @category    ScandiPWA
 * @package     ScandiPWA_GraphQl
 * @author      scandiweb <info@scandiweb.com>
 * @copyright   Copyright (c) 2021 Scandiweb, Ltd (https://scandiweb.com)
 */
declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'ScandiPWA_GraphQl',
    __DIR__
);

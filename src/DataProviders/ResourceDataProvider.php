<?php declare(strict_types = 1);

/**
 * This file is part of the FireHub Project ecosystem
 *
 * @author Danijel Galić <danijel.galic@outlook.com>
 * @copyright 2026-present The FireHub Project - All rights reserved
 * @license https://opensource.org/license/Apache-2-0 Apache License, Version 2.0
 *
 * @php-version >=7.4
 * @package Testing
 */

namespace FireHub\Testing\DataProviders;

/**
 * ### Resource data provider
 * @since 1.0.0
 */
final class ResourceDataProvider {

    /**
     * @since 1.0.0
     *
     * @return array<array<resource>>
     */
    public static function stream ():array {

        return [
            [fopen('php://stdout', 'wb')]
        ];

    }

}
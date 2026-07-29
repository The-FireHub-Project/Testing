<?php declare(strict_types = 1);

/**
 * This file is part of the FireHub Project ecosystem
 *
 * @author Danijel Galić <danijel.galic@outlook.com>
 * @copyright 2026-present The FireHub Project - All rights reserved
 * @license https://opensource.org/license/MIT MIT License
 *
 * @php-version >=7.4
 * @package Testing
 */

namespace FireHub\Testing\Stubs;

use Countable;

/**
 * ### Countable class
 * @since 1.0.0
 */
class CountableClass implements Countable {

    /**
     * @since 1.0.0
     *
     * @return int
     */
    public function count ():int {

        return 10;

    }

}
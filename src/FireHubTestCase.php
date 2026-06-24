<?php declare(strict_types = 1);

/**
 * This file is part of the FireHub Project ecosystem
 *
 * @author Danijel Galić <danijel.galic@outlook.com>
 * @copyright 2026-present The FireHub Project - All rights reserved
 * @license https://opensource.org/license/MIT MIT License
 *
 * @php-version >=7.0
 * @package Testing
 */

namespace FireHub\Testing;

use PHPUnit\Framework\TestCase;

/**
 * ### FireHub Test Case
 *
 * Base testing abstraction for the FireHub ecosystem built on top of PHPUnit.
 *
 * This class provides a unified foundation for all FireHub test suites and ensures consistent structure,
 * extensibility, and future support for shared testing utilities across Core, Runtime, and ecosystem packages.
 *
 * It is not intended to contain business logic but to serve as the root entry point for all FireHub-specific testing
 * behavior.
 * @since 1.0.0
 */
abstract class FireHubTestCase extends TestCase {}
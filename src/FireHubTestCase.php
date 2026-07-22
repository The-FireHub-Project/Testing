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

namespace FireHub\Testing;

use PHPUnit\Framework\TestCase;

use function restore_error_handler;
use function set_error_handler;

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
abstract class FireHubTestCase extends TestCase {

    /**
     * ### Execute callback with suppressed PHP errors
     *
     * Temporarily suppresses selected PHP error levels during callback execution.
     *
     * This is intended for testing Runtime wrappers that intentionally handle native PHP errors.
     *
     * <code>
     *  $this->suppressPhpErrors(
     *      static fn():void => $this->assertSame(1, 2),
     *      E_WARNING|E_NOTICE
     *  );
     * </code>
     * @since 1.0.0
     *
     * @param callable():void $callback <p>
     * The callback to execute.
     * </p>
     * @param int-mask-of<E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_CORE_ERROR|E_CORE_WARNING|E_COMPILE_ERROR|E_COMPILE_WARNING|E_USER_ERROR|E_USER_WARNING|E_USER_NOTICE|E_RECOVERABLE_ERROR|E_DEPRECATED|E_USER_DEPRECATED> $levels [optional] <p>
     * The error levels to suppress.
     *
     * Available options:
     *
     * - E_ERROR             Fatal run-time errors.
     * - E_WARNING           Run-time warnings.
     * - E_PARSE             Compile-time parse errors.
     * - E_NOTICE            Run-time notices.
     * - E_CORE_ERROR        Fatal errors that occur during PHP startup.
     * - E_CORE_WARNING      Warnings that occur during PHP startup.
     * - E_COMPILE_ERROR     Fatal compile-time errors.
     * - E_COMPILE_WARNING   Compile-time warnings.
     * - E_USER_ERROR        User-generated fatal errors.
     * - E_USER_WARNING      User-generated warnings.
     * - E_USER_NOTICE       User-generated notices.
     * - E_RECOVERABLE_ERROR Catchable fatal errors.
     * - E_DEPRECATED        Run-time deprecation notices.
     * - E_USER_DEPRECATED   User-generated deprecation notices.
     * - E_ALL               All errors, warnings, and notices.
     *
     * Multiple levels can be combined using bitwise OR operator.
     *
     * Example:
     *
     *     E_WARNING | E_NOTICE
     *
     * </p>
     *
     * @return void
     */
    protected function suppressPhpErrors (callable $callback, int $levels = E_WARNING):void {

        set_error_handler(static fn(int $severity):bool => ($severity & $levels) !== 0, $levels);

        try {

            $callback();

        } finally {

            restore_error_handler();

        }

    }

}
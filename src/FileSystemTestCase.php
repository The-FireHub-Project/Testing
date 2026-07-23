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

use RuntimeException;

use function is_dir;
use function mkdir;
use function sprintf;
use function sys_get_temp_dir;

/**
 * ### File System Test Case
 *
 * Provides common testing utilities and lifecycle management for testing file system-related components.
 *
 * This abstraction simplifies temporary file and directory creation, cleanup, and isolated filesystem testing
 * across FireHub packages.
 *
 * It is intended to be used as a base class for tests that interact with files, folders, paths, permissions,
 * and other filesystem resources.
 * @since 1.0.0
 */
abstract class FileSystemTestCase extends FireHubTestCase {

    /**
     * ### Temporary folder path
     * @since 1.0.0
     */
    protected string $temp_folder;

    /**
     * @inheritDoc
     *
     * @since 1.0.0
     *
     * @throws RuntimeException If the temporary directory cannot be created.
     */
    protected function setUp ():void {

        parent::setUp();

        $this->temp_folder = sys_get_temp_dir().'/firehub-test';

        if (
            !mkdir($concurrentDirectory = $this->temp_folder)
            && !is_dir($concurrentDirectory)
        ) throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));

    }

}
<?php

namespace Core\Migration;

/**
 * Interface MigrationInterface
 * @package Core\Migration
 */
interface MigrationInterface
{
    /**
     * @return bool
     */
    public function up(): bool;

    /**
     * @return bool
     */
    public function down():bool;
}
<?php

/**
 * UUID v4 Generator
 * 
 * This library provides a simple and secure way to generate UUID v4 (Universally Unique Identifier, Version 4).
 * 
 * @category Library
 * @package  UUID
 * @version  1.0.0
 * @author   Ramazan Çetinkaya
 * @license  MIT License
 * @link     https://github.com/ramazancetinkaya/uuid-v4-generator
 */
class UUID
{
    /**
     * Generate a random UUID v4.
     *
     * @return string The generated UUID v4.
     * @throws Exception If the random number generator fails.
     */
    public static function generate(): string
    {
        // Generate 16 random bytes for UUID v4
        $bytes = random_bytes(16);
        
        // Set the version (4) and variant (RFC 4122) bits
        $bytes[6] = chr(ord($bytes[6]) & 0x0f | 0x40); // version 4
        $bytes[8] = chr(ord($bytes[8]) & 0x3f | 0x80); // variant RFC 4122
        
        // Convert the binary UUID to a hexadecimal representation
        $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));

        return $uuid;
    }

    /**
     * Validate a given UUID v4.
     *
     * @param string $uuid The UUID to validate.
     * @return bool True if the UUID is valid, false otherwise.
     */
    public static function validate(string $uuid): bool
    {
        // Regular expression pattern to validate UUID v4
        $pattern = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i';
        return preg_match($pattern, $uuid) === 1;
    }
}

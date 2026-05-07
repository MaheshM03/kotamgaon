<?php
/**
 * Secure Password Helper
 * 
 * Replaces insecure double base64 encoding with industry-standard bcrypt hashing
 * 
 * DO NOT use base64_encode() for passwords - it's completely insecure!
 * Use password_hash() and password_verify() instead.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('hash_password'))
{
    /**
     * Hash a password using bcrypt
     * 
     * @param string $password The plain text password
     * @return string The hashed password
     */
    function hash_password($password)
    {
        // Bcrypt automatically generates salt and uses strong algorithm
        // Cost parameter 12 provides good security/performance balance
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }
}

if ( ! function_exists('verify_password'))
{
    /**
     * Verify a password against its hash
     * 
     * @param string $password The plain text password to check
     * @param string $hash The hash from database
     * @return bool TRUE if password matches, FALSE otherwise
     */
    function verify_password($password, $hash)
    {
        return password_verify($password, $hash);
    }
}

if ( ! function_exists('rehash_password_if_needed'))
{
    /**
     * Check if password needs rehashing (PHP version changed or cost increased)
     * 
     * @param string $hash The stored password hash
     * @return bool TRUE if rehashing is recommended
     */
    function rehash_password_if_needed($hash)
    {
        return password_needs_rehash($hash, PASSWORD_BCRYPT, ['cost' => 12]);
    }
}

/* End of file password_helper.php */
/* Location: ./application/helpers/password_helper.php */

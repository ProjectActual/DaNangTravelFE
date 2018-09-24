<?php

/*
 * CKFinder
 * ========
 * http://cksource.com/ckfinder
 * Copyright (C) 2007-2015, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */

namespace CKSource\CKFinder;

use CKSource\CKFinder\ResourceType\ResourceType;

class Utils
{
    /**
     * Convert shorthand php.ini notation into bytes, much like how the PHP source does it
     * @link http://pl.php.net/manual/en/function.ini-get.php
     *
     * @param string $val
     *
     * @return int
     */
    public static function returnBytes($val)
    {
        $val = strtolower(trim($val));

        if (!$val) {
            return 0;
        }

        $bytes = ltrim($val, '+');
        if (0 === strpos($bytes, '0x')) {
            $bytes = intval($bytes, 16);
        } elseif (0 === strpos($bytes, '0')) {
            $bytes = intval($bytes, 8);
        } else {
            $bytes = intval($bytes);
        }

        switch (substr($val, -1)) {
            case 't':
                $bytes *= 1024;
            case 'g':
                $bytes *= 1024;
            case 'm':
                $bytes *= 1024;
            case 'k':
                $bytes *= 1024;
        }

        return $bytes;
    }

    /**
     * The absolute pathname of the currently executing script.
     * If a script is executed with the CLI, as a relative path, such as file.php or ../file.php,
     * $_SERVER['SCRIPT_FILENAME'] will contain the relative path specified by the user.
     */
    public static function getRootPath()
    {
        if (isset($_SERVER['SCRIPT_FILENAME'])) {
            $sRealPath = dirname($_SERVER['SCRIPT_FILENAME']);
        } else {
            /**
             * realpath — Returns canonicalized absolute pathname
             */
            $sRealPath = realpath('.');
        }

        $sRealPath = static::trimPathTrailingSlashes($sRealPath);

        /**
         * The filename of the currently executing script, relative to the document root.
         * For instance, $_SERVER['PHP_SELF'] in a script at the address http://example.com/test.php/foo.bar
         * would be /test.php/foo.bar.
         */
        $sSelfPath = dirname($_SERVER['PHP_SELF']);
        $sSelfPath = static::trimPathTrailingSlashes($sSelfPath);

        return static::trimPathTrailingSlashes(substr($sRealPath, 0, strlen($sRealPath) - strlen($sSelfPath)));
    }

    /**
     * @param  string $path
     *
     * @return string
     */
    protected static function trimPathTrailingSlashes($path)
    {
        return rtrim($path, DIRECTORY_SEPARATOR . '/\\');
    }

    /**
     * Checks if array contains all specified keys
     *
     * @param array $array
     * @param array $keys
     *
     * @return true if array has all required keys, false otherwise
     */
    public static function arrayContainsKeys(array $array, array $keys)
    {
        return count(array_intersect_key(array_flip($keys), $array)) === count($keys);
    }

    /**
     * Simulate the encodeURIComponent() function available in JavaScript
     *
     * @param string $str
     *
     * @return string
     */
    public static function encodeURLComponent($str)
    {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');

        return strtr(rawurlencode($str), $revert);
    }

    /**
     * Decodes URL component
     *
     * @param string $str
     *
     * @return string
     */
    public static function decodeURLComponent($str)
    {
        return rawurldecode($str);
    }

    /**
     * Decodes URL parts
     *
     * @param string $str
     *
     * @return string
     */
    public static function decodeURLParts($str)
    {
        return static::decodeURLComponent($str);
    }

    /**
     * Encodes URL parts
     *
     * @param string $str
     *
     * @return string
     */
    public static function encodeURLParts($str)
    {
        $revert = array('%2F'=>'/');

        return strtr(static::encodeURLComponent($str), $revert);
    }

    /**
     * Returns formatted date string generated for given timestamp
     *
     * @param int $timestamp
     *
     * @return string
     */
    public static function formatDate($timestamp)
    {
        return date('YmdHis', $timestamp);
    }

    /**
     * Removes any cache headers that might be set by session cache limiter
     * @link http://php.net/manual/en/function.session-cache-limiter.php
     */
    public static function removeSessionCacheHeaders()
    {
        $headersToRemove = array('Expires', 'Cache-Control', 'Last-Modified', 'Pragma');

        foreach ($headersToRemove as $header) {
            header_remove($header);
        }
    }

    /**
     * Checks if given data chunk contains HTML-like data.
     *
     * @param string $chunk
     *
     * @return bool true if provided code chunk contains HTML-like data
     */
    public static function containsHtml($chunk)
    {
        $chunk = strtolower($chunk);

        if (!$chunk) {
            return false;
        }

        $chunk = trim($chunk);

        if (preg_match("/<!DOCTYPE\W*X?HTML/sim", $chunk)) {
            return true;
        }

        $tags = array('<body', '<head', '<html', '<img', '<pre', '<script', '<table', '<title');

        foreach ($tags as $tag) {
            if (false !== strpos($chunk, $tag)) {
                return true;
            }
        }

        //type = javascript
        if (preg_match('!type\s*=\s*[\'"]?\s*(?:\w*/)?(?:ecma|java)!sim', $chunk)) {
            return true;
        }

        //href = javascript
        //src = javascript
        //data = javascript
        if (preg_match('!(?:href|src|data)\s*=\s*[\'"]?\s*(?:ecma|java)script:!sim', $chunk)) {
            return true;
        }

        //url(javascript
        if (preg_match('!url\s*\(\s*[\'"]?\s*(?:ecma|java)script:!sim', $chunk)) {
            return true;
        }

        return false;
    }

    /**
     * Replaces double extensions disallowed for resource type.
     *
     * @param string       $fileName
     * @param ResourceType $resourceType
     *
     * @return string file name with replaced double extensions
     */
    public static function replaceDisallowedExtensions($fileName, ResourceType $resourceType)
    {
        $pieces = explode('.', $fileName);

        $basename = array_shift($pieces);
        $lastExtension = array_pop($pieces);

        foreach ($pieces as $ext) {
            $basename .= $resourceType->isAllowedExtension($ext) ? '.' : '_';
            $basename .= $ext;
        }

        // Add the last extension to the final name.
        return $basename . '.' . $lastExtension;
    }
}

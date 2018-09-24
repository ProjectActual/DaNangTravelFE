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

namespace CKSource\CKFinder\Filesystem\Folder;

use CKSource\CKFinder\Filesystem\File\File;
use CKSource\CKFinder\Filesystem\Path;
use CKSource\CKFinder\ResourceType\ResourceType;

/**
 * Class Folder
 *
 * Represents a folder in filesystem
 */
class Folder
{
    /**
     * @var ResourceType $resourceType
     */
    protected $resourceType;

    /**
     * Backend relative path (includes resource type directory)
     *
     * @var string $path
     */
    protected $path;

    /**
     * @param ResourceType $resourceType resource type
     * @param string       $path         resource type relative path
     */
    public function __construct(ResourceType $resourceType, $path)
    {
        $this->resourceType = $resourceType;
        $this->path = Path::combine($resourceType->getDirectory(), $path);
    }

    /**
     * Check whether $folderName is a valid folder name, return true on success
     *
     * @param string $folderName
     * @param bool   $disallowUnsafeCharacters
     *
     * @return boolean
     */
    public static function isValidName($folderName, $disallowUnsafeCharacters)
    {
        if ($disallowUnsafeCharacters) {
            if (strpos($folderName, ".") !== false) {
                return false;
            }
        }

        return File::isValidName($folderName, $disallowUnsafeCharacters);
    }
}

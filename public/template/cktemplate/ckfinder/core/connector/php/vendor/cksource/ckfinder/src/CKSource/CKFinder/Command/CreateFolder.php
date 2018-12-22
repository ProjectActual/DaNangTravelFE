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

namespace CKSource\CKFinder\Command;

use CKSource\CKFinder\Acl\Permission;
use CKSource\CKFinder\Filesystem\Folder\WorkingFolder;
use Symfony\Component\HttpFoundation\Request;

class CreateFolder extends CommandAbstract
{
    protected $requires = array(Permission::FOLDER_CREATE);

    public function execute(Request $request, WorkingFolder $workingFolder)
    {
        $newFolderName = (string) $request->query->get('newFolderName', '');

        $workingFolder->createDir($newFolderName);

        return array('newFolder' => $newFolderName);
    }
}

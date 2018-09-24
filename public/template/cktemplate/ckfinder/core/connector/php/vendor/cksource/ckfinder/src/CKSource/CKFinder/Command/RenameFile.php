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
use CKSource\CKFinder\Event\CKFinderEvent;
use CKSource\CKFinder\Event\RenameFileEvent;
use CKSource\CKFinder\Exception\AccessDeniedException;
use CKSource\CKFinder\Exception\InvalidNameException;
use CKSource\CKFinder\Filesystem\File\RenamedFile;
use CKSource\CKFinder\Filesystem\Folder\WorkingFolder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;

class RenameFile extends CommandAbstract
{
    protected $requires = array(Permission::FILE_RENAME);

    public function execute(Request $request, WorkingFolder $workingFolder, EventDispatcher $dispatcher)
    {
        $fileName = (string) $request->get('fileName');
        $newFileName = (string) $request->get('newFileName');

        if (null === $fileName || null === $newFileName) {
            throw new InvalidNameException('Invalid file name');
        }

        $renamedFile = new RenamedFile(
            $newFileName,
            $fileName,
            $workingFolder->getClientCurrentFolder(),
            $workingFolder->getResourceType(),
            $this->app
        );

        if ($renamedFile->isValid()) {
            $renamedFileEvent = new RenameFileEvent($this->app, $renamedFile);

            $dispatcher->dispatch(CKFinderEvent::RENAME_FILE, $renamedFileEvent);

            if (!$renamedFileEvent->isPropagationStopped()) {
                if (!$renamedFile->doRename()) {
                    throw new AccessDeniedException();
                }
            }
        }


        return array(
            'name'    => $fileName,
            'newName' => $renamedFile->getNewFileName()
        );
    }
}

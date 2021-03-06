<?php

/*
 * Copyright (C) 2017 Nethesis S.r.l.
 * http://www.nethesis.it - nethserver@nethesis.it
 *
 * This script is part of NethServer.
 *
 * NethServer is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License,
 * or any later version.
 *
 * NethServer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with NethServer.  If not, see COPYING.
 */

namespace NethServer\Module\BackupConfig;

class Reinstall extends \Nethgui\Controller\Table\AbstractAction
{

    public function process()
    {
        if($this->getRequest()->isMutation()) {
            $packages = implode(',', array_map('trim', file('/var/lib/nethserver/backup/package-list')));
            $this->getPlatform()->exec('/usr/bin/sudo /usr/libexec/nethserver/pkgaction --install ${1}', array($packages), TRUE);
        }
    }

}
<?php

namespace DesignPattern\Structural\Bridge\Reports\FileType;

use DesignPattern\Structural\Bridge\Reports\Content\ExportedContent;

interface FileExported
{
    public function save(ExportedContent $exportedContent): string;
}
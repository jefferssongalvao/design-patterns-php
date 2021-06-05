<?php

namespace DesignPattern\Structural\Bridge;

use DesignPattern\Structural\Bridge\Reports\Content\ExportedContent;
use DesignPattern\Structural\Bridge\Reports\FileType\FileExported;

class Report
{
    private FileExported $fileExported;
    private ExportedContent $exportedContent;
    public function __construct(FileExported $fileExported, ExportedContent $exportedContent)
    {
        $this->fileExported = $fileExported;
        $this->exportedContent = $exportedContent;
    }

    public function export(): string
    {
        return $this->fileExported->save($this->exportedContent);
    }
}
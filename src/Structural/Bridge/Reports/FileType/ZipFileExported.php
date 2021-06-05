<?php

namespace DesignPattern\Structural\Bridge\Reports\FileType;

use DesignPattern\Structural\Bridge\Reports\Content\ExportedContent;
use ZipArchive;

class ZipFileExported implements FileExported
{
    private string $internalFile;
    public function __construct(string $internalFile)
    {
        $this->internalFile = $internalFile;
    }
    
    public function save(ExportedContent $exportedContent): string
    {
        $fileDirectory = tempnam(sys_get_temp_dir(), "zip");

        $zipFile = new ZipArchive();

        $zipFile->open($fileDirectory);
        $zipFile->addFromString($this->internalFile, serialize($exportedContent));
        $zipFile->close();

        return $fileDirectory;
    }
}

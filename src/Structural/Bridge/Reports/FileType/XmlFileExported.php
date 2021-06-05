<?php

namespace DesignPattern\Structural\Bridge\Reports\FileType;

use DesignPattern\Structural\Bridge\Reports\Content\ExportedContent;
use SimpleXMLElement;

class XmlFileExported implements FileExported
{
    private string $parentElement;
    public function __construct(string $parentElement)
    {
        $this->parentElement = $parentElement;
    }
    
    public function save(ExportedContent $exportedContent): string
    {
        $xmlElement = new SimpleXMLElement("<{$this->parentElement} />");

        foreach ($exportedContent as $item => $value) {
            $xmlElement->addChild($item, $value);
        }

        $fileDirectory = tempnam(sys_get_temp_dir(), "xml");
        
        $xmlElement->asXML($fileDirectory);

        return $fileDirectory;
    }
}

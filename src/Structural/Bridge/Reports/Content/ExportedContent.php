<?php

namespace DesignPattern\Structural\Bridge\Reports\Content;

interface ExportedContent
{
    public function content(): array;
}
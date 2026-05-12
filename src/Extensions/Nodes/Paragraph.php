<?php

namespace Momenoor\FilamentTiptapEditor\Extensions\Nodes;

use Tiptap\Nodes\Paragraph as BaseParagraph;

class Paragraph extends BaseParagraph
{
    public function addAttributes(): array
    {
        return [
            [
                'class' => [
                    'default' => null,
                ],
            ],
        ];
    }
}

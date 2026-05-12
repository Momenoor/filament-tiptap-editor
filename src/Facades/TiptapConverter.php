<?php

namespace Momenoor\FilamentTiptapEditor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string asHTML(string|array $content)
 * @method static string asJSON(string|array $content, bool $decoded)
 * @method static string asText(string|array $content)
 *
 * @see \Momenoor\FilamentTiptapEditor\TiptapConverter
 */
class TiptapConverter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'tiptap-converter';
    }
}

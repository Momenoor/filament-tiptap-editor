<?php

use Momenoor\FilamentTiptapEditor\TiptapConverter;

if (! function_exists('tiptap_converter')) {
    function tiptap_converter(): TiptapConverter
    {
        return app(TiptapConverter::class);
    }
}

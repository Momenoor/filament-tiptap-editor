<?php

namespace Momenoor\FilamentTiptapEditor\Tests\Models;

use Momenoor\FilamentTiptapEditor\Tests\Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected static function newFactory(): PageFactory
    {
        return new PageFactory;
    }

    protected $guarded = [];

    protected $casts = [
        'json_content' => 'array',
    ];
}

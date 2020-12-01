<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrawledPage extends Model
{
    protected $guarded = [];

    protected $casts = [
        'website_id' => 'int',
        'found_on' => 'array',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}

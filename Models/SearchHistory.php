<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SearchHistory extends Model
{
     use HasFactory;
     use Searchable;

     public function searchableAs()
    {
        return 'searchhistories_index';
    }

    public function toSearchableArray()
    {
        $final = [];
        $final['keyword'] = $this->keyword;

        return $final;
    }

    public function user() {
        return $this->belongsTo(User::class);

}
}
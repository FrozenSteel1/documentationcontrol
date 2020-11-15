<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected  $guarded=[''];
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('doc_name', 'like', '%'.$search.'%')
                ->orWhere('doc_number', 'like', '%'.$search.'%');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Category extends Model
{
    protected $fillable = ['CategoryName', 'description'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (static::where('CategoryName', $model->CategoryName)->exists()) {
                throw ValidationException::withMessages(['CategoryName' => ' CategoryName must be unique.']);
            }
        });
    }
}

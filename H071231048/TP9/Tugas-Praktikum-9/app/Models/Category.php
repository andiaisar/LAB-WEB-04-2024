<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (static::where('name', $model->name)->exists()) {
                throw ValidationException::withMessages(['name' => 'Category name must be unique.']);
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
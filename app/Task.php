<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'body'
    ];

    public static function incomplete()
    {
        return static::where('completed', 0)->get();
    }

    public static function getTasksPage(array $sort)
    {
        return static::orderBy($sort['column'], $sort['direct'])->paginate(5)->appends($sort);
    }
}

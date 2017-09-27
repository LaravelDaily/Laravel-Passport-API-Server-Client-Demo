<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 *
 * @package App
 * @property string $title
 * @property text $description
 */
class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description'];


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class PageViews extends Model implements Viewable
{
    use InteractsWithViews;

    protected $guarded = ['id'];
}

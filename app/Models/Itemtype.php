<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemtype extends Model
{
    use HasFactory;

    protected $table = 'itemtype';

    protected $fillable = ['type','description'];

    
    protected $casts = ['type' => 'string', 'description' => 'string'];
   // App\Models\Itemtype.php
public function items()
{
    return $this->belongsToMany(Item::class, 'itemtypes_itemlist', 'itemtype_id', 'item_id');
}
}
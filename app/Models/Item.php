<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'itemlist';

    protected $fillable = [
        'name', 'description', 'quantity', 'itemtype_id'
    ];
    
    protected $casts = [
        'quantity' => 'integer',
    ];
    
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'charas_item', 'item_id', 'characters_id');
    }
    
// App\Models\Item.php
public function itemtypes()
{
    return $this->belongsTo(Itemtype::class, 'itemtype_id');
}
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // status
    const STATUS = [
        0 => ['label' => '新規', 'class' => 'new'],
        1 => ['label' => '進行中', 'class' => 'doing'],
        2 => ['label' => '完了', 'class' => 'done'],
    ];

    public function getStatusLabelAttribute() {
        $status = $this->attributes['status'];
        if(!isset(self::STATUS[$status])) {return '';}
        return self::STATUS[$status]['label'];
    }
    public function getStatusClassAttribute() {
        $status = $this->attributes['status'];
        if(!isset(self::STATUS[$status])) {return '';}
        return self::STATUS[$status]['class'];
    }

    public function scopeDescriptionFilter($query, string $description = null) {
        if(!isset($description)) {
            return $query;
        }
        return $query->where('description','like','%'.$description.'%');
    }
    public function user() {
        return $this->belongsto('App\User');
    }

}

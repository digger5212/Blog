<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

class Reply extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'topic_id',
        'content',
        'user_id',
    ];

    public function topic() {
        return $this->belongsTo(Topic::class); // n belongsTo 1
    }

    public function userName()
    {
        return User::find($this->user_id)->name;
    }
}

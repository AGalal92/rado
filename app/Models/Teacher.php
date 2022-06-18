<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'skill_id'];

    public function category()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

    public static function rules()
    {
        return [
            'name' => 'required|min:3',
            'phone' => 'required|min:11|max:11',
            'skill_id' => 'required|exists:skills,id'
        ];
    }
}

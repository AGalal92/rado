<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'national_id', 'phone', 'pay', 'skill_id'];

    public function category()
    {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

    public static function rules()
    {
        return [
            'name' => 'required|min:3',
            'national_id' => 'required|min:14|max:14',
            'phone' => 'required|min:11|max:11',
            'pay' => 'required',
            'skill_id' => 'required|exists:skills,id'
        ];
    }
}

<?php

namespace App\Models\management;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Sluggable;
    

    protected $fillable = ['name','description','slug','user_id','hit','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
 
    /**
     * پیکربندی‌های اسلاگ برای این مدل را برگردان.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value)->format('Y/m/d');
    }

    public function getUpdatedAtAttribute($value)
    {
        return verta($value)->format('Y/m/d');
    }
}

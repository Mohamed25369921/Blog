<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['title', 'content','address'];
    protected $fillable = ['id', 'logo', 'favicon', 'phone', 'email', 'facebook', 'instagram', 'created_at', 'updated_at', 'deleted_at'];

    static function checkSettings(){
        $settings = self::all();
        if(count($settings) < 1){
            $data = [
                'id' => 1,
            ];
            foreach(config('app.languages') as $key => $value){
                $data[$key]['title'] = $value;
            }
            self::create($data);
        }
        return self::first();
    }
}

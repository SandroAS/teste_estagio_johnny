<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'category',
        'type',
        'user',
        'sale_price',
        'promotion_price',
        'description',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'white',
        'black',
        'blue',
        'green',
        'yellow',
        'red',
        'pink',
        'purple',
        'gray',
        'brown',
        'beige',
        'silver',
        'golden',
        'title',
        'slug',
        'headline',
        'experience',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product', 'id')
            ->orderBy('cover', 'ASC');
    }

    public function cover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if (!$cover) {
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if (empty($cover['path']) || !File::exists('../public/storage/' . $cover['path'])) {
            return url(asset('backend/assets/images/realty.jpeg'));
        }

        return Storage::url(Cropper::thumb($cover['path'], 1366, 768));
    }

    public function scopeProducts($query)
    {
        // $owners = DB::table('users')->get();

        // foreach($owners as $owner){
        //     $value = [];
        //     if($owner->admin === 1){
        //         $value = [
        //         'owner' => $owner->id,
        //         ];

        //     };
        // };
        // dd($value);
        // $users = DB::table('users')->join('id', 'estagio.id', '=', 'products.user')->get();
        // dd($users);
        return $query->where('user', $users);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }

    //Setters e Getters
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' ? 1 : 0);
    }

    public function setSalePriceAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['sale_price'] = null;
        } else {
            $this->attributes['sale_price'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getSalePriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setPromotionPriceAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['promotion_price'] = null;
        } else {
            $this->attributes['promotion_price'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getPromotionPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setWhiteAttribute($value)
    {
        $this->attributes['white'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setBlackAttribute($value)
    {
        $this->attributes['black'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setBlueAttribute($value)
    {
        $this->attributes['blue'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setGreenAttribute($value)
    {
        $this->attributes['green'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setYellowAttribute($value)
    {
        $this->attributes['yellow'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setRedAttribute($value)
    {
        $this->attributes['red'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setPinkAttribute($value)
    {
        $this->attributes['pink'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setPurpleAttribute($value)
    {
        $this->attributes['purple'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setGrayAttribute($value)
    {
        $this->attributes['gray'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setBrownAttribute($value)
    {
        $this->attributes['brown'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setBeigeAttribute($value)
    {
        $this->attributes['beige'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setSilverAttribute($value)
    {
        $this->attributes['silver'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setGoldenAttribute($value)
    {
        $this->attributes['golden'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    public function setSlug()
    {
        if (!empty($this->title)) {
            $this->attributes['slug'] = str_slug($this->title) . '-' . $this->id;
            $this->save();
        }
    }

    private function convertStringToDouble($param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }
}

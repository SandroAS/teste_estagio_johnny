<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'sale',
        'owner',
        'acquirer',
        'product',
        'price',
        'status'
    ];

    public function ownerObject()
    {
        return $this->hasOne(User::class, 'id', 'owner');
    }

    public function productObject()
    {
        return $this->hasOne(Product::class, 'id', 'product');
    }

    public function acquirerObject()
    {
        return $this->hasOne(User::class, 'id', 'acquirer');
    }

    public function scopePendent($query)
    {
        return $query->where('status', 'pendent');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCanceled($query)
    {
        return $query->where('status', 'canceled');
    }

    //Getters e Setters
    public function setSaleAttribute($value)
    {
        if($value === true || $value === 'on') {
            $this->attributes['sale'] = 1;
        }
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setPriceAttribute($value)
    {
        if(!empty($value)){
            $this->attributes['price'] = floatval($this->convertStringToDouble($value));
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function setCreatedAtAttribute($value)
    {
        if(!empty($value)){
            $this->attributes['created_at'] = $this->convertStringToDate($value);
        }
    }

    //Conveter dados
    private function convertStringToDouble($param)
    {
        if(empty($param)){
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
    }

    private function convertStringToDate($param)
    {
        if(empty($param)) {
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}

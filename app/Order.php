<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Appends fields to Order's array.
     *
     * @var array
     */
    protected $appends = ['orderSum'];

    public function products()
    {
        return $this->belongsToMany('\App\Product', 'order_products')->withPivot('quantity', 'price');
    }

    /**
     * Calculate order sum.
     *
     * @return float
     */
    public function getOrderSumAttribute()
    {
        $orderSum = 0;

        foreach ($this->products as $product) {
            $orderSum += $product->pivot->quantity * $product->pivot->price;
        }

        return floatval($orderSum);
    }

    public function partner()
    {
        return $this->hasOne('\App\Partner', 'id', 'partner_id');
    }
}

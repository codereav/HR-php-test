<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this
            ->belongsToMany('\App\Product', 'order_products')
            ->select('products.*','order_products.quantity')
            ->selectRaw('sum(order_products.quantity * order_products.price) as summa')
            ->groupBy('order_products.id');
    }


    public function partner()
    {
        return $this->hasOne('\App\Partner', 'id', 'partner_id');
    }
}

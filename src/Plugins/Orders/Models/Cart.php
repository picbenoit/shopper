<?php

namespace Mckenziearts\Shopper\Plugins\Orders\Models;

use Illuminate\Database\Eloquent\Model;
use Mckenziearts\Shopper\Plugins\Promo\Models\Coupon;
use Mckenziearts\Shopper\Plugins\Users\Models\User;

class Cart extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $table = 'shopper_carts';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartContent()
    {
        return $this->hasMany(CartContent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function coupons()
    {
        return $this->morphToMany(Coupon::class, 'couponable', 'shopper_coupons_couponables');
    }
}

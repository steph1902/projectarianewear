<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billing_details extends Model
{
    //
        protected $table = 'billing_details';

        protected $fillable =
        [
            'order_id',
            'first_name',
            'last_name',
            'address',
            'provinces',
            'cities',
            'postal_code',
            'email',
            'phone',
            'notes',
            'total_weight',
            'total_price',
            'status',
            'snap_token'


        ];

        public function setPending()
        {
            $this->attributes['status'] = 'pending';
            self::save();
        }

        /**
         * Set status to Success
         *
         * @return void
         */
        public function setSuccess()
        {
            $this->attributes['status'] = 'success';
            self::save();
        }

        /**
         * Set status to Failed
         *
         * @return void
         */
        public function setFailed()
        {
            $this->attributes['status'] = 'failed';
            self::save();
        }

        /**
         * Set status to Expired
         *
         * @return void
         */
        public function setExpired()
        {
            $this->attributes['status'] = 'expired';
            self::save();
        }


}

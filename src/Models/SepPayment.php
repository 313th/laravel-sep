<?php

namespace sahifedp\Sep\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $family
 * @property string $mobile
 * @property integer $amount
 * @property string $description
 * @property boolean $status
 * @property string $refnum
 * @property string $card_pan
 * @property string $rrn
 * @property string $trace_number
 * @property integer $wage
 * @property string $meta
 */
class SepPayment extends Model
{
    const SEP_PAYMENT_STATUS_CREATED = 0;
    const SEP_PAYMENT_STATUS_PAYED = 1;
    const SEP_PAYMENT_STATUS_VERIFIED = 2;
    const SEP_PAYMENT_STATUS_RETURNED = 3;
    const SEP_PAYMENT_STATUS_ERROR = 4;
    const SEP_PAYMENT_STATUSES = [
        self::SEP_PAYMENT_STATUS_CREATED => 'ایجاد شده',
        self::SEP_PAYMENT_STATUS_PAYED => 'پرداخت شده',
        self::SEP_PAYMENT_STATUS_VERIFIED => 'تایید شده',
        self::SEP_PAYMENT_STATUS_RETURNED => 'برگشت خورده',
        self::SEP_PAYMENT_STATUS_ERROR => 'خطا',
    ];

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name', 'family', 'mobile', 'amount', 'description', 'status', 'refnum', 'card_pan', 'rrn', 'trace_number', 'wage', 'meta'];

}

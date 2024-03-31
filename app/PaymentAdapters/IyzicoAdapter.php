<?php
namespace App\PaymentAdapters;

class IyzicoAdapter implements PaymentAdapter
{
    public function pay($amount, $currency)
    {
        return true;
    }
}

<?php
namespace App\PaymentAdapters;

class StripeAdapter implements PaymentAdapter
{
    public function pay($amount, $currency)
    {
        return true;
    }
}

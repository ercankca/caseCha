<?php

namespace App\PaymentAdapters;

interface PaymentAdapter
{
    public function pay($amount, $currency);
}

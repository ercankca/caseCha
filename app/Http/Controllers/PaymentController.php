<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\PaymentAdapters\StripeAdapter;
use App\PaymentAdapters\IyzicoAdapter;
use App\Notifications\PaymentReceived;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $user = User::find(auth()->id());
        $paymentProvider = $user->payment_provider;


        if ($paymentProvider === 'stripe') {

            $stripeAdapter = new StripeAdapter();
            $result = $stripeAdapter->pay($request->amount, $request->currency);
        } elseif ($paymentProvider === 'iyzico') {

            $iyzicoAdapter = new IyzicoAdapter();
            $result = $iyzicoAdapter->pay($request->amount, $request->currency);
        } else {

            $result = false;
        }


        if ($result) {
            $user->notify(new PaymentReceived());
            return response()->json(['message' => 'Payment successful'], 200);
        } else {
            return response()->json(['message' => 'Payment failed'], 400);
        }
    }
}

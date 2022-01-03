<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function accountUpgrade(Request $request)
    {
        $this->validate($request,[
            'proof_of_payment'=> ['required', 'mimes:jpeg,jpg,png,gif,svg' , 'image', 'file', 'max:5242880']
        ]);

        $proofOfPayment = time() . '.' . $request->proof_of_payment->getClientOriginalName();
        $request->proof_of_payment->storeAs('public/payments/', $proofOfPayment);

        $res = auth()->user()->subscriptions()->create([
            'status'=>0,
            'code'=>$this->generateRandomString(6),
            'transaction_id' => Str::uuid(),
            'proof_of_payment' => $proofOfPayment,
        ]);

        return redirect()->route('thankyou',$res->transaction_id);
    }

    public function paymentForm()
    {
        $pendingSubscription = auth()->user()->subscriptions()->where('status', 0)->latest()->first();
        if(auth()->user()->is_premium || $pendingSubscription){
            $message = $pendingSubscription ? 'You have pending subscription. Wait for admin review and confirmation.' : 'You still have active subscription.';
            return redirect()->route('user.profile')->with('message',  $message);
        }
        return view('users.payment');
    }

    public function thankyou($transaction_id)
    {
        $subscription = Subscription::where('transaction_id',$transaction_id)->first();
        if(!$subscription){
            abort(404);
        }
        return view('users.thankyou', compact('subscription'));
    }

    private function generateRandomString($length = 25) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

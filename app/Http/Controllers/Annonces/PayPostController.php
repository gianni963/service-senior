<?php

namespace App\Http\Controllers\Annonces;

use App\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayPostController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
		
	}
    public function PaymentForm(Annonce $annonce)
    {
        $this->authorize('pay', $annonce);
       
        if($annonce->live())
        {
            return back();
        }
        return view('annonces.payment.form', compact('annonce'));
    }

    public function Process(Request $request, Annonce $annonce)
    {
        $this->authorize('pay', $annonce);
        
        if($annonce->live()) {
            return back();
        }

        $payment_token = $request->payment_method_nonce;

        if($payment_token === null){
            return back();
        }

        $transaction = \Braintree_Transaction::sale([
            'amount' => 1,
            'paymentMethodNonce' =>$payment_token,


        ]);
        //si la transaction échoue
        if($transaction->success === false){
            return back()->withErrors('La transaction a échouée');
        }
        //Si la transaction réussit l'annonce est publiée
        $annonce->live = true;
        $annonce->created_at = \Carbon\Carbon::now();
        $annonce->save();


        return redirect()->route('annonces.published.index')->withSuccess('votre annonce est en ligne');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;

class StripeController extends Controller
{
    public function checkout(MembershipPlan $plan)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $plan->name . ' Membership - ' . $plan->organisation->name,
                        ],
                        'unit_amount' => $plan->price * 100,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('dashboard') . '?payment=success&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('public.organisations.show', $plan->organisation),
            'metadata' => [
                'user_id' => auth()->id(),
                'plan_id' => $plan->id,
                'organisation_id' => $plan->organisation_id,
            ],
        ]);

        return redirect($checkout_session->url);
    }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            $this->handleSuccessfulPayment($session);
        }

        return response()->json(['status' => 'success']);
    }

    protected function handleSuccessfulPayment($session)
    {
        $metadata = $session->metadata;
        $plan = MembershipPlan::find($metadata->plan_id);
        $organisation = $plan->organisation;

        $feePercentage = $organisation->transaction_fee / 100;
        $amount = $session->amount_total / 100;
        $feeAmount = $amount * $feePercentage;

        Transaction::create([
            'user_id' => $metadata->user_id,
            'membership_plan_id' => $metadata->plan_id,
            'organisation_id' => $metadata->organisation_id,
            'amount' => $amount,
            'transaction_fee' => $feeAmount,
            'stripe_session_id' => $session->id,
            'status' => 'completed',
        ]);
    }
}

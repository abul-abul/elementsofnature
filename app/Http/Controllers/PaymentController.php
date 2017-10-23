<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Api\Plan;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Sale;
use PayPal\Api\Refund;
//use Auth;
//use App\Contracts\CartInterface;
//use App\Contracts\ItemInterface;
//use App\Contracts\OrderInterface;
//use App\Contracts\ShippingAddressInterface;
//use App\Contracts\MailInterface;
use App\Contracts\GalleryCategoryImagesInnerInterface;
use App\Contracts\GalleryCategoryFrameInterface;


class PaymentController extends Controller
{


    public function getPayPage($id,
                                GalleryCategoryImagesInnerInterface $innerRepo,
                                GalleryCategoryFrameInterface $frameRepo
                                )
    {
        $inner = $innerRepo->getOne($id);

        dd($inner);
    }

    public function getPayPal()
    {
        $sdkConfig = array(
            "mode" => "sandbox"
        );
        $apiContext = new ApiContext(new OAuthTokenCredential(config("app.paypal_client_id"), config("app.paypal_client_secret")));


        $apiContext->setConfig($sdkConfig);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $transactionArr = [];
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal(2000);
        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(action('PaymentController@getPaypalReturnResponse'));

        $redirectUrls->setCancelUrl(action('PaymentController@getPaypalCancelResponse'));

        $payment = new Payment();

        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($apiContext);

        $redirectUrl = $payment->getApprovalLink();

        return redirect()->to($redirectUrl);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getPaypalReturnResponse(Request $request)
    {
        $token = $request->get('token');
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');
        $sdkConfig = array(
            "mode" => "sandbox"
        );
        $apiContext = new ApiContext(new OAuthTokenCredential(config("app.paypal_client_id"), config("app.paypal_client_secret")));
        $apiContext->setConfig($sdkConfig);
        $payment = new Payment();
        $payment->setId($paymentId);

        $paymentExec = new PaymentExecution;
        $paymentExec->setPayerId($payerId);
        return redirect()->action('UsersController@getHome');
    }

    public function getPaypalCancelResponse(Request $request)
    {
        dd('cancle');
        //return redirect()->action('age');
    }

}

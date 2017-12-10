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
use App\Contracts\PartnersInterface;
use App\Contracts\PaymentInterface;
use Validator;

class PaymentController extends Controller
{

    /**
     * @param Request $request
     * @param GalleryCategoryImagesInnerInterface $innerRepo
     * @param GalleryCategoryFrameInterface $frameRepo
     * @param PartnersInterface $partnerRepo
     * @return mixed
     */
    public function getPayPage(request $request,
                                GalleryCategoryImagesInnerInterface $innerRepo,
                                GalleryCategoryFrameInterface $frameRepo,
                                PartnersInterface $partnerRepo
                                )
    {
        $result = $request->all();
        $patners = $partnerRepo->getAll();
        $data = [
           'id' => $result['id'],
           'size' => $result['size'],
           'frame' => $result['frame'],
           'price' => $result['price'],
           'partners' => $patners
        ];
        if($data['size'] == '' || $data['price'] == ''){
            return redirect()->back()->with('message','Please choose the size');
        }
        $inner = $frameRepo->getOne($result['id']);
        return view('users.paypal.paypal-page',$data);

    }
    


    public function getPayPal($data)
    {

        $sdkConfig = array(
            "mode" => "sandbox"
        );

        $apiContext = new ApiContext(new OAuthTokenCredential(config("app.paypal_client_id"), config("app.paypal_client_secret")));

        $price = (int)$data['price'];
        $apiContext->setConfig($sdkConfig);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $transactionArr = [];
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal($price);
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
     * @param PaymentInterface $payRepo
     * @return mixed
     */
    public function postPayment(request $request,
                                PaymentInterface $payRepo,
                                GalleryCategoryFrameInterface $frameRepo
                                )
    {

        $result = $request->all();
        $validator = Validator::make($result, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city_town' => 'required',
            'postalcode' => 'required',
            'pay_checkbox' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $inner = $frameRepo->getOne($result['p']);

            $result['price'] = $inner['price'];
            $result['status'] = 0;
            $payRepo->createData($result);
            //return redirect()->back();
           return $this->getPayPal($result);
        }
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

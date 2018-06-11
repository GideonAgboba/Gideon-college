<?php
namespace App\Http\Controllers;
use App\Http\Requests;
// use App\Http\Request\AddMoneyValidate;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
class AddMoneyController extends Controller
{
 public function payWithStripe()
 {
    return view('users.payments.other-payment');
 }
public function postPaymentWithStripe(Request $request)
 {
    //  $owner = User::find($request->user_id)->first();
    //  $owner_fullname = $owner->surname .' ' .$request->firstname .' ' .$request->othername;
    $validator = Validator::make($request->all(), [
        'card_no' => 'required',
        'ccExpiryMonth' => 'required',
        'ccExpiryYear' => 'required',
        'cvvNumber' => 'required',
        //'amount' => 'required',
        ]);
 $input = $request->all();
 if ($validator->passes()) { 
 $input = array_except($input,array('_token'));
 $stripe = Stripe::make('sk_test_0GtUAlijEbD49MTgsiiwKDvK');
 try {
 $token = $stripe->tokens()->create([
 'card' => [
 'number' => $request->get('card_no'),
 'exp_month' => $request->get('ccExpiryMonth'),
 'exp_year' => $request->get('ccExpiryYear'),
 'cvc' => $request->get('cvvNumber'),
 ],
 ]);
 // $token = $stripe->tokens()->create([
 // 'card' => [
 // 'number' => '4242424242424242',
 // 'exp_month' => 10,
 // 'cvc' => 314,
 // 'exp_year' => 2020,
 // ],
 // ]);
if (!isset($token['id'])) {
 return redirect()->route('addmoney.paywithstripe');
 
 }
 $charge = $stripe->charges()->create([
 'card' => $token['id'],
 'currency' => 'NGN',
 'amount' => 75000.000,
 'description' => 'School fees payment',
//  'customer' => $owner_fullname,
 ]);
 
 if($charge['status'] == 'succeeded') {
 /**
 * Write Here Your Database insert logic.
 */
//  echo "<pre>";
//  print_r($charge);exit();
//  return redirect()->route('addmoney.paywithstripe');
    return back();
// return 'Done!';

 } else {
 \Session::put('error','School fees not paid to account!!');
 return back();
    // return 404;
    /// give errro msg
}
 } catch (Exception $e) {
 \Session::put('error',$e->getMessage());
  return back();
 } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
 \Session::put('error',$e->getMessage());
  return back();
 } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
 \Session::put('error',$e->getMessage());
  return back();
 }
 }
 }
}
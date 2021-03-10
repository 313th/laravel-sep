<?php


namespace sahifedp\Sep\Controllers;

use App\Http\Controllers\Controller;
use sahifedp\Sep\Mail\Payment;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use sahifedp\Sep\Models\SepPayment;
use sahifedp\Sep\Sep;

class CallbackController extends Controller {
    /**
     * Display the registration view.
     * @param  int $id
     * @return Theme
     */
    public function result($id) {
        $status = "error";
        $model = SepPayment::findOrFail($id);
        $to = explode(',', env('ADMIN_MAIL'));
        Mail::to($to)->queue(new Payment($model));
        $title = 'خیلی بد شد!';
        return Theme::view('sep.result',['status'=>$status,'model'=>$model,'title'=>$title]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id,Request $request) {
        if(isset($request->Status) && $request->Status == 2 && !empty($id)){
            if(SepPayment::where(['refnum'=>$request->RefNum])->count() > 0){
                //Double Spending!!
                return Theme::view('sep.result',['status'=>'error','title'=>"رسید تراکنش تکراری است",'message'=>"د ارسالی از طرف بانک تکراری است. در صورتیکه مبلغی از حساب شما کسر شده است. حداکثر طی 72 ساعت آتی به حساب شما برگشت خواهد خورد"]);
            }
            $model = SepPayment::findOrFail($id);
            $model->status = SepPayment::SEP_PAYMENT_STATUS_PAYED;
            $model->save();
            $result = Sep::verify($request->RefNum);
            if($result < 0){
                if($result == -6){
                    $model->status = SepPayment::SEP_PAYMENT_STATUS_RETURNED;
                    $model->save();
                }
                return Theme::view('sep.result',['status'=>'error','title'=>"خطا در تایید تراکنش",'message'=>"خطای تایید تراکنش، کد ".$result."در صورتیکه مبلغی از حساب شما کسر شده است. حداکثر طی 72 ساعت آتی به حساب شما برگشت خواهد خورد"]);
            }else{
                if($result == $model->amount + $model->wage){
                    $model->status = SepPayment::SEP_PAYMENT_STATUS_VERIFIED;
                    $model->refnum = $request->RefNum;
                    $model->card_pan = $request->SecurePan;
                    $model->rrn = $request->Rrn;
                    $model->trace_number = $request->TraceNo;
                    $model->wage = $request->Wage;
                    $model->save();
                    $to = explode(',', env('ADMIN_MAIL'));
                    Mail::to($to)->queue(new Payment($model));
                    return Theme::view('sep.result',['status'=>'success','title'=>"پرداخت موفق",'message'=>"پرداخت با موفقیت انجام شد.",'model'=>$model]);
                }else{
                    $returnResult = Sep::reverse($request->RefNum);
                    if($returnResult == 1) {
                        $model->status = SepPayment::SEP_PAYMENT_STATUS_RETURNED;
                        $model->save();
                        return Theme::view('sep.result',['status'=>'error','title'=>"خطا در تایید تراکنش - تراکنش برگشت خورد",'message'=>"خطا در تایید تراکنش. در صورتیکه مبلغی از حساب شما کسر شده است. حداکثر طی 72 ساعت آتی به حساب شما برگشت خواهد خورد"]);
                    }else{
                        return Theme::view('sep.result',['status'=>'error','title'=>"خطا در تایید تراکنش",'message'=>"خطای برگشت کد ".$returnResult."در صورتیکه مبلغی از حساب شما کسر شده است. حداکثر طی 72 ساعت آتی به حساب شما برگشت خواهد خورد"]);
                    }
                }
            }
            dd($result);
        }else{ // Payment Error
            return Theme::view('sep.result',['status'=>'error','title'=>"تراکنش انجام نشد",'message'=>$request->errorDesc."در صورتیکه مبلغی از حساب شما کسر شده است. حداکثر طی 72 ساعت آتی به حساب شما برگشت خواهد خورد"]);
        }
    }
}

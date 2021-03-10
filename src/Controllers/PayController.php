<?php


namespace sahifedp\Sep\Controllers;

use App\Http\Controllers\Controller;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use sahifedp\Sep\Models\SepPayment;
use sahifedp\Sep\Sep;

class PayController extends Controller {
    /**
     * Display the registration view.
     * @param  \Illuminate\Http\Request  $request
     * @return Theme|string
     */
    public function create(Request $request) {
        Theme::asset()->writeScript('add-commas','
        $("#amount").keyup(function () {
//            var input = $(this).val().split(\',\').join("");
//            $(this).val(input.replace(/(\d)(?=(\d{3})+(?!\d))/g, \'$1,\'));
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        })
        ','jquery');
        return Theme::view('sep.pay',['request'=>$request]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'string|max:255|min:2',
            'family' => 'required|string|max:255|min:2',
            'mobile' =>  'required|numeric|min:11',
            'amount' =>  'required|min:3',
        ]);
        $amount = preg_replace("/[^0-9]/", "",$request->amount);
        $model = SepPayment::create([
            'name' => $request->name ,
            'family' => $request->family ,
            'mobile' => $request->mobile ,
            'amount' => $amount ,
            'description' => $request->description ,
        ]);
        $result = Sep::getToken($model);
        if($result->status == 1 && isset($result->token)){
            return redirect(route('sep.pay.submit',['token'=>$result->token]));
        }
        return redirect(route('sep.pay.create',[
            'name'=>$request->name,
            'family'=>$request->family,
            'mobile'=>$request->mobile,
            'amount'=>$amount,
            'description'=>$request->description
        ]))->withErrors(['خطای شماره '.$result->errorCode.': '.$result->errorDesc]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  string $token
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function submit($token) {
        return view('sep::submit',['token'=>$token]);
    }
}

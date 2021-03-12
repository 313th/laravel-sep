<?php


namespace sahifedp\Sep\Controllers;

use App\Http\Controllers\Controller;
use sahifedp\Sep\Mail\Payment;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use sahifedp\Sep\Models\SepPayment;
use sahifedp\Sep\Sep;

class GeneratorController extends Controller {
    /**
     * Display the registration view.
     * @return Theme
     */
    public function create() {
        return Theme::view(['view'=>'sep.generate','layout'=>'simple']);
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
        $result = Sep::shorten(
            route('sep.pay.create',
                $request->all(['amount','name','family','mobile','description'])
            ),
            "لینک پرداخت برای ".$request->name." ".$request->family
        );
        if($result->success) {
            Theme::asset()->writeScript('copy-text','
            function copyText(element){
                var copyText = document.getElementById(element);
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                console.log($("#a-"+element).text("کپی شد!"));
            }
            ','jquery');
            return Theme::view(['view'=>'sep.short','layout'=>'simple'],['request'=>$request,'url'=>$result->doc->url]);
        }
        dd($result);
    }
}

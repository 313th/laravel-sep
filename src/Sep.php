<?php


namespace sahifedp\Sep;


use CodeDredd\Soap\Facades\Soap;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use SoapClient;
class Sep {

    private static function request($url,$data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT@SECLEVEL=1');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }

    public static function getToken($model){
        $wage = 0;
        $amount = $model->amount;
        if(!empty(config('sep.config.WageType')) && config('sep.config.WageType') != 'None'){
            if(config('sep.config.WageType') == 'Amount'){
                $wage = config('sep.config.WageValue');
            }elseif(config('sep.config.WageType') == 'Percent'){
                $wage = (int) ($amount * config('sep.config.WageValue'));
            }
            if(config('sep.config.CalcCommissionType') == '-'){
                $amount = $amount - $wage;
            }elseif(config('sep.config.CalcCommissionType') == '+'){
                $amount = $amount + $wage;
            }
        }
        $model->amount = $amount;
        $model->wage = $wage;
        $model->save();
        $postRequest = [
            'Action' => 'Token',
            'Amount' => $amount,
            'Wage' => $wage,
//            'AffectiveAmount' => '',
            'TerminalId' => config('sep.config.terminalId'),
            'ResNum' => 'PAY-'.$model->id,
            'ResNum1' => 'پرداخت آنلاین توسط '.$model->name.' '.$model->family,
            'ResNum2' => (!empty($model->description))?'بابت '.$model->description:'',
            'RedirectURL' => route('sep.callback',['id'=>$model->id]),
            'CellNumber' => $model->mobile,
        ];

        return self::request(config('sep.config.url'),$postRequest);
    }

    public static function verify($refNum){
        $client = new SoapClient(config('sep.config.vurl'));
        $response = $client->verifyTransaction($refNum,config('sep.config.terminalId'));
        return $response;
    }

    public static function reverse($refNum){
        $client = new SoapClient(config('sep.config.vurl'));
        $response = $client->reverseTransaction($refNum,config('sep.config.terminalId'),config('sep.config.terminalId'),config('sep.config.password'));
        return $response;
    }

    public static function shorten($url,$title="لینک پرداخت"){
        $data = json_encode([
            "title" => $title,
            "url" => $url,
        ]);

        $ch = curl_init('https://yun.ir/api/v1/urls');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-API-Key: 395:ltuwp7knk740k44gc404gkckc0ckkks',
            'Content-Length: ' . strlen($data)
        ]);
        $result = curl_exec($ch);
        return json_decode($result);
    }
}

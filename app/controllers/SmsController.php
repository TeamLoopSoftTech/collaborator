<?php

class SmsController extends BaseController{

	public function showSms(){
        require ('GlobeApi/GlobeApi.php');
        $globe = new GlobeApi();
        $auth = $globe->auth(
            'BgdaSaKRKpu4Rio9BEcRaxuGzgaRSGxL',
            'cb3d1fa51ceeee87f898d3060599f133c9b06c7aeb956b80dc74da161ee17839'
        );

        if(!isset($_SESSION['code'])) {
            $loginUrl = $auth->getLoginUrl();
            header('Location: '.$loginUrl);
            exit;
        }


	}


    public function showSmsresponse(){
        $code = $_GET['code'];
        return Redirect::route('SMS',$code);

    }

    public function SMS($code){

        require ('GlobeApi/GlobeApi.php');
        $globe = new GlobeApi();

        $auth = $globe->auth(
            'BgdaSaKRKpu4Rio9BEcRaxuGzgaRSGxL',
            'cb3d1fa51ceeee87f898d3060599f133c9b06c7aeb956b80dc74da161ee17839'
        );


        if(!isset($code)) {
            $loginUrl = $auth->getLoginUrl();
            header('Location: '.$loginUrl);
            exit;
        }

        $response = $auth->getAccessToken($code);

        $access_token = $response['access_token'];
        $subscriber_number = $response['subscriber_number'];

//        echo $access_token.":".$subscriber_number;

        $message = "Loop Soft-Tech Team. SMS";

        $sms = $globe->sms(1618);
        $response = $sms->sendMessage($access_token, $subscriber_number, $message);



        return View::make('sms');

    }

}

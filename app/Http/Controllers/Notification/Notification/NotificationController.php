<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;


class NotificationController extends Controller
{

    public function sendWebNotification()
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        //array of token
        $FcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
        //$user=User::whereNotNull('device_key')->value('name');

       // $token_device="fK7l5qZSQp2K7IIMgkCj0M:APA91bFi_MBUw7qg_TL3uDhn_acV2PY_KxxJU1SrJEJBTSnkjzTYD_UX7cyiNjuqzKH-5NQNM2QSCZQnhDrUDMPVeaafaX_cCrNcOoqVvpnuXHXaD_9vjAK3FVf1YLtQwLnheV-_PU-H";
        $serverKey ='AAAA3VaZBTw:APA91bHC5NCnyXpSPKUnOxi-WkFcZdT68VPtzp6GjiRr3Q0TqkDanZzGxrWtwIQOOSsTDSn6tS0yP5myo-K0h-w1U5fzbWiEQLFbFkhUMGC5MZWtq-_rtG6WI1Ym-f4cV-gbrouzKfBf';
       
        $data = [
            //tokens
            "registration_ids" => $FcmToken,
            //"registration_ids" => [$token_device ,],

            "notification" => [
                "title" => "hello ",
                "body" => "How are you ?",
            ]
        ];

        //transfer from array to json
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
        // curl تهيئة لل 
        $ch = curl_init();
        //cloud messaging الذي يتيح استخدام خدمة url  ارسسال ريكوست لل 
        curl_setopt($ch, CURLOPT_URL, $url);
        //نوع الطلب
        curl_setopt($ch, CURLOPT_POST, true);
        //headers ارفاق ال 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //ارفاق امور اضافية
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        // FCM response
        dd($result);
    }
    
}


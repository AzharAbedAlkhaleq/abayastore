<?php


namespace App\Helpers;


use Twilio\Rest\Client;

class TwilioSMS
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
    }
    public function sendSMSVerificationCode($user,$mobile,$purpose,$data=null)
    {
        $verification_code = generateRandomDigits(4);
        $message = 'Your '. env('APP_NAME') .' verification code is : '. $verification_code;

        try {
            $response = $this->client->messages->create($mobile,
                [
                    'from' => env('TWILIO_FROM_NUMBER'),
                    'body' => $message,
                    'messagingServiceSid' => env('TWILIO_MESSAGING_SERVICE_SID')
                ]
            );
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }

        if (in_array($response->status,['queued','accepted','sent'])) {
            $record = [
                'msg_id' => $response->sid,
                'purpose' => $purpose,
                'code' => $verification_code,
                'status' => 0
            ];
            if ($purpose === 'CAV') {
                $record['adv_id'] = $data['adv_id'];
                $record['mobile'] = $mobile;
            }
            $user->mobileVerifications()->create($record);

            return ['status' => true, 'message' => getMessage('sms_v_code_sent')];
        } else {
            return ['status' => false, 'message' => 'failed to send sms message !'.$response['message']];
        }
    }
}

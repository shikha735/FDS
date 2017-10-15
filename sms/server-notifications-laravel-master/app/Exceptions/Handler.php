<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Log;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        $this->_notifyThroughSms($e);
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        return parent::render($request, $e);
    }

    private function _notifyThroughSms($e)
    {
        foreach ($this->_notificationRecipients() as $recipient) {
            $this->_sendSms(
                $recipient->phone_number,
                '[This is a test] It appears the server' .
                ' is having issues. Exception: ' . $e->getMessage() .
                ' Go to http://newrelic.com for more details.'
            );
        }
    }

    private function _notificationRecipients()
    {
        $adminsFile = base_path() .
            DIRECTORY_SEPARATOR .
            'config' . DIRECTORY_SEPARATOR .
            'administrators.json';
        try {
            $adminsFileContents = \File::get($adminsFile);

            return json_decode($adminsFileContents);
        } catch (FileNotFoundException $e) {
            Log::error(
                'Could not find ' .
                $adminsFile .
                ' to notify admins through SMS'
            );
            return [];
        }
    }

    private function _sendSms($to, $message)
    {
        $accountSid = env('AC381678f35d7168603a9e04d4a9cb3d4a');
        $authToken = env('50ec52d96d8f4d56649dac0318933f4a');
        $twilioNumber = env('+1 804-886-3236');

        $client = new Client($accountSid, $authToken);

        try {
            $client->messages->create(
                $to,
                [
                    "body" => $message,
                    "from" => $twilioNumber
                    //   On US phone numbers, you could send an image as well!
                    //  'mediaUrl' => $imageUrl
                ]
            );
            Log::info('Message sent to ' . $twilioNumber);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );
        }
    }
}

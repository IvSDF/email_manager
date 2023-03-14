<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.index');
    }

    public function sendEmail(EmailRequest $request)
    {
        $data = $request->validated();
        $userIP = $request->ip();
        $uuid = Str::uuid();
        $userAgent = $request->server('HTTP_USER_AGENT');

        request()->session()->put(['data' => $data]);

        Email::firstOrCreate([
            'uuid' => $uuid,
            'email_from' => $data['email_from'],
            'email_to' => $data['email_to'],
            'email_cc' => $data['email_cc'],
            'user_ip' => $userIP,
            'user_agent' => $userAgent
        ]);

        require '../vendor/autoload.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = env('EMAIL_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = env('EMAIL_USERNAME');
        $mail->Password   = env('EMAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom($data['email_from']);
        $mail->addAddress($data['email_to']);

        if($data['email_cc'] !== null) {
            $mail->addCC($data['email_cc']);
        }else

        $mail->Subject = $data['subject'];

        $mail->isHTML(true);
        $mail->Body = $data['body'];

        if ($mail->send()){

            return redirect()->route('email.success', ['uuid' => $uuid]);
        }
    }

    public function success($uuid)
    {
        $date = request()->session()->get('data');
        return view('email.show', ['uuid', $uuid, 'data' => $date]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;

class EmailController extends Controller
{
    protected $email = Email::class;
    public function create()
    {
        return view('email.create');
    }

    public function sendEmail(EmailRequest $request)
    {
        $data = $request->validated();
        $userIP = $request->ip();
        $uuid = Str::uuid();
        $userAgent = $request->server('HTTP_USER_AGENT');


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
        $mail->Body    = $data['body'];

        if ($mail->send()){
            return $this->success($request);
        }
    }

    public function success(EmailRequest $request)
    {
        $data = $request->validated();
        return view('email.show', ['data' => $data]);
    }
}


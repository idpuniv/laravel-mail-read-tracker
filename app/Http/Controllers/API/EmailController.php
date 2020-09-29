<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Email;
use App\Report;
use App\User;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sentEmail(Request $request)
    {
        return response()->json([
            'success' => 'true',
            'data' => auth()->user()->sent
        ], 200);
    }
    
    public function store(Request $request)
    {
        
        $mail = new PHPMailer(true);
            
        try {
            //Server settings

            //$mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'paulido92@gmail.com';                     // SMTP username
            $mail->Password   = 'IdP#i@gm.com95@';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS enryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);

            //Recipients
            $mail->setFrom('paulido92@gmail.com');
            //$mail->setFrom(Auth()->user()->mail_addr);
            $mail->addAddress($request->get('receiver_addr'));     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

            // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $request->get('subject');
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $body = $request->get('body');
            $track_code = md5(rand());
            $base_url = 'https://idomailer.herokuapp.com/';
            //$base_url = 'http://localhost/';
            // $body .= '<img src="{{route(blank, $track_code)}}" width="1" height="1" border="0" alt=""/>';

            $body .= '<b> Paul </b> <img src="'.$base_url.$track_code.'/webbug.php" width="1" height="1" border="0" alt=""/>';
            $mail->Body = $body;
            $mail->send(); //send the the mail

            $mail = Email::create([
                'sender_addr' => auth()->user()->email,
                'subject' => $request->get('subject'),
                'body' => $request->get('body'),
                'status' => 'sent',
            ]);

                Report::create([
                    'email_id' => $mail->id,
                    'user_id' => auth()->user()->id,
                    'receiver_addr' => $request->get('receiver_addr'),
                    'track_code' =>$track_code,
                    'status' => 'sent',
                ]); 

            return response()->json([
                'succes' => 'true',
                'message' => 'email sent succufully',
            ], 200);

            

        } 
        catch (Exception $e) 
        {
            
            return response()->json([
                'error' => [
                    'code' => '500',
                    'message' => 'the server has encountered a problem when sending the mail'
                ]
            ]);
        }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $email)
    {
        return response()->json([
           Email::where('sender_addr', auth()->user()->email)->where('email_id', $email)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, $email)
    {
        return response()->json([
            'success' => 'true',
            'data' => Report::where('email_id', $email)->where('user_id', auth()->user()->id)->get()
        ], 200);
    }

    public function emailreports(Request $request)
    {
        $emails = auth()->user()->sent;
        $emailreport = [] ;
        foreach($emails as $email)
        {
            $emailreport = ['email' => $email, 'report' => $email->report];
        }
        
        return response()->json([
            'success' => 'true',
            'data' => $emailreport
        ], 200);
    }


    public function drafts(Request $request)
    {
        return response()->json([
            'success' => 'true',
            'data' => auth()->user()->drafts
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($email)
    {
        if(Email::find($email)->delete())
        {
            return response()->json([
                'sucdess' => 'true',
                'message' => 'data deleted succesfully',
            ], 200);
        }
        else
        {
            return response()->json([
                'sucdess' => 'false',
                'message' => 'operation failed',
            ], 401);
        }
    }

}

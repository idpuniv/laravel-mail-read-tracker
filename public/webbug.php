<?php 
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Repositories\ImageRepository;
use App\Email;
use App\Report;
use Carbon\Carbon;

function track(Request $request)
    {

        
        //$count = count($report);

        if (!empty($_SERVER['REMOTE_ADDR'])) 
        {
          
          $track_code = $request->route()->parameter('id');
          $report = Report::where('track_code', $track_code)->first();

            if(!empty($report)) // tracked mail exists
          {
              $report->clics = $report->clics+1;
              if($report->clics == 0) //mail has not opened yet
              {
                  $report->open_date = Carbon::now(); //setting open date
              }
              $report->update();

          }
          else // tracked mail dosen't exist(perhaps it has been droped)
          {
              $temp = 0;
          }

        }

        
    }  
    track();


<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;
use File;

class CareerMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public static function getDestinationEmails()
    {
        return 'mail@gulf-yachts.com';
    }

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $request = $this->request;

       if($request->file !=null){
           $fileContent = File::get($request->file->getRealPath());
           $fileExtension = $request->file->getClientOriginalExtension();
           $attachmentName = str_slug($request->name)."-ressume.".$fileExtension;
           return $this->view('emails.career-mail')
             ->attachData($fileContent,$attachmentName);
       }
       return $this->view('emails.career-mail');
    }
}

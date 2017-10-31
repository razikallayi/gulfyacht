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

    const DESTINATION_EMAIL= "info@gulfavanues.com";

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

       $fileContent = File::get($request->file_source->getRealPath());
      
       $fileExtension = $request->file_source->getClientOriginalExtension();

       $attachmentName = str_slug($request->file_source)."_resume.".$fileExtension;
       
       return $this->view('emails.career-mail')->attachData($fileContent,$attachmentName);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;
use File;
// use Swift_Attachment;

class SellBoat extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The request instance.
     *
     * @var Request
     */
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


    public static function getDestinationEmails()
    {
        return ['razi@whytecreations.in'];
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
          $attachmentName = str_slug($request->email)."-boat_to_sell.".$fileExtension;
          return $this->view('emails.sell-boat')
            ->attachData($fileContent,$attachmentName);
      }
      return $this->view('emails.sell-boat');
  }
}

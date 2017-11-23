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
      return ['razi@whytecreations.in','razikallayi@gmail.com'];
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $request = $this->request;
      $returnData = $this->view('emails.sell-boat');
      if($request->files !=null){
        foreach($request->files as $file){
          $fileContent = File::get($file->getRealPath());
          $fileExtension = $file->getClientOriginalExtension();
          $attachmentName = str_slug($request->email)."-boat_to_sell-".$loop->iteration.".".$fileExtension;
          $returnData->attachData($fileContent,$attachmentName);
        }
        return $returnData;
      }
      return $this->view('emails.sell-boat');
    }
  }

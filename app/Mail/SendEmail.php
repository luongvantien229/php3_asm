<?php //app/Mail/Guimail.php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class SendEmail extends Mailable {
    use Queueable, SerializesModels;
    public $hoten="";
    public $email=""; 
    public $noidung=""; 
    public function __construct( $ht, $em, $nd ){
        $this->hoten = $ht;
        $this->email = $em;
        $this->noidung = $nd;
    }
    public function envelope() {
        return new Envelope(subject: 'Mail liên hệ từ khách hàng',);
    }
    public function content() { 
       return new Content( view: 'viewContactMail',);
    }
    public function attachments() { return []; }
}
<?php
class Mail{
    public string $sender_name;
    public string $sender_email;
    public string $message;
    public string $subject = 'Formulaire de contact FR - Master CAWEB';
    
    public array $addressees;

    public function __construct($sender_name, $sender_email, $message, $addressees)
    {
        $this->sender_name = $sender_name;
        $this->sender_email = $sender_email;
        $this->message = $message;
        $this->addressees = $addressees;
    }

    public function send_mail(){
        $addressees = implode(', ',$this->addressees);
        $message = "Nom : ".$this->sender_name."\nEmail : ".$this->sender_email."\nMessage : \n";
        $message .= htmlspecialchars($this->message);
        mail($addressees, $this->subject, $message);
    }
}
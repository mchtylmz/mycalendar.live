<?php

namespace App\Libraries;

use \Config\Services;

class Email
{
  protected $email;

  public function __construct(array $config = [])
  {
  	$this->email = Services::email();
    $this->email->setFrom('mycalendar.live@yandex.com', 'myCalendar.live');
  }

  public function to(string $email)
  {
    $this->email->setTo($email);
    return $this;
  }

  public function reset_password_link(array $user) : bool
  {
    $this->email->setSubject(lang('Auth.email.resetPasswordSubject'));
    $this->email->setMessage(view('emails/reset-password', $user));
    return $this->email->send();
  }
}

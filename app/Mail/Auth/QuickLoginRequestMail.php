<?php

declare(strict_types=1);

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuickLoginRequestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        private string $loginUrl,
        private bool $isRegistration
    ) {}

    public function build()
    {
        return $this->view('mail.auth.quick_login_request')
            ->with(
                [
                    'link' => $this->loginUrl,
                    'isRegistration' => $this->isRegistration
                ]
            );
    }
}

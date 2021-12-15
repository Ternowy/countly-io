<?php

declare(strict_types=1);

namespace App\Mail\Auth;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private User $user
    ) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.auth.user_registered_email')
            ->with(
                [
                    'name' => $this->user->name
                ]
            );
    }
}

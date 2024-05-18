<?php

namespace Structural;

interface EmailService
{
    public function send(string $to, string $subject, string $body): string;
}

class GoogleEmailService implements EmailService
{
    public function send(string $to, string $subject, string $body): string
    {
        return 'GoogleEmailService: Sent email to ' . $to . ' with subject ' . $subject . ' and body ' . $body;
    }
}

class MicrosoftEmailService implements EmailService
{
    public function send(string $to, string $subject, string $body): string
    {
        return 'MicrosoftEmailService: Sent email to ' . $to . ' with subject ' . $subject . ' and body ' . $body;
    }
}

class EmailServiceAdapter
{
    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    public function send(string $to, string $subject, string $body): string
    {
        return $this->emailService->send($to, $subject, $body);
    }
}

$adapater = new EmailServiceAdapter(new GoogleEmailService());
$adapter2 = new EmailServiceAdapter(new MicrosoftEmailService());

echo $adapater->send('a@a.com', 'subject', 'body');
echo $adapter2->send('a@a.com', 'subject', 'body');

<?php

public function sendAction()
{
    $message = $this->createMessage(
        'hello',
        ['name' => $name],
        'send@example.com',
        'recipient@example.com'
    )->attach(\Swift_Attachment::fromPath('your-information.pdf'));

    $this->send($message);
}


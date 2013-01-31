<?php

public function sendAction()
{
    $message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('send@example.com')
        ->setTo('recipient@example.com')
        ->setBody(
            $this->renderView(
                'App:Mails:hello.txt.twig',
                array('name' => $name)
            )
        )
        ->addPart(
            $this->renderView(
                'App:Mails:hello.txt.twig',
                array('name' => $name)
            ),
            'text/html'
        )
        ->attach(Swift_Attachment::fromPath('your-information.pdf'))
    ;

    $this->get('mailer')->send($message);
}



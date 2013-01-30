<?php

// i18n-driven flash messages (actual)
// messages are in messages.yml and key is
// used in controllers - `app_blogposts_update.success`
public function updateAction()
{
    $this->get('session')
        ->getFlashBag()
        ->add('success', 'app_blogposts_update.success')
    ;
}

// entire message in controller
public function newAction()
{
    $this->get('session')
        ->getFlashBag()
        ->add('success', 'Successfully created')
    ;
}

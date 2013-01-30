<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function updateAction()
    {
        $this
            ->get('session')
            ->getFlashBag()
            ->add(
                'success',
                'Your modifications were successfully saved!'
            );
    }
}

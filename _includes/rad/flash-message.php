<?php

namespace App\Controller;

use Knp\RadBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function updateAction()
    {
        $this->addFlash('success');
    }
}

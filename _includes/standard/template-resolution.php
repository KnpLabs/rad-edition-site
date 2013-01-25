<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogPostsController extends Controller
{
    public function indexAction()
    {
        return $this->render('App:BlogPosts:index', [
            'blogPosts' => $this->getBlogPosts()
        ]);
    }
}

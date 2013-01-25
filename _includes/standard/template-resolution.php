<?php

namespace App\Controller;

class BlogPostsController
{
    public function indexAction()
    {
        return $this->render('App:BlogPosts:index', [
            'blogPosts' => $this->getBlogPosts()
        ]);
    }
}

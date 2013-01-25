<?php

namespace App\Controller;

class BlogPostsController
{
    public function indexAction()
    {
        return ['blogPosts' => $this->getBlogPosts()];
    }
}

<?php

namespace App\Controller;

class BlogPostsController
{
    public function indexAction()
    {
        $blogPosts = $this->get('orm.blogpost_repository')->findAll();

        return ['blogPosts' => $blogPosts];
    }
}

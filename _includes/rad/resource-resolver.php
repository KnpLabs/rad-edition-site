<?php

namespace App\Controller;

class BlogPostsController
{
    public function indexAction(array $blogPosts)
    {
        return ['blogPosts' => $blogPosts];
    }

    public function showAction(BlogPost $blogPost)
    {
        return ['blogPost' => $blogPost];
    }
}

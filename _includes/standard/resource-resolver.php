<?php

namespace App\Controller;

class BlogPostsController
{
    public function indexAction()
    {
        $blogPosts = $this->getDoctrine()
            ->getManager()
            ->getRepository('App:Blogpost')
            ->findAll()
        ;

        return ['blogPosts' => $blogPosts];
    }
}

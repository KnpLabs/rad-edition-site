<?php

public function deleteAction($id)
{
    $blogPost = $this->findOr404('App:BlogPost', ['id' => $id]);
    $this->remove($blogPost, true);

    return $this->redirectToRoute('app_blogposts_index');
}

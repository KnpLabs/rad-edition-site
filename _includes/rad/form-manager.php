<?php

public function newAction()
{
    $post = new BlogPost;
    $form = $this->createBoundObjectForm($post, 'new');

    if ($form->isBound() && $form->isValid()) {
        $this->persist($post, true);
        $this->addFlash('success');

        return $this->redirectToRoute('app_blogposts_index');
    }

    return ['form' => $form->createView()];
}

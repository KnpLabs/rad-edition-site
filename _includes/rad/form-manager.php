<?php

public function editAction()
{
    // You don't even have to create a form type!
    // Form will also automatically be bound, but
    // only on non-safe request (POST|PUT|DELETE)
    $form = $this->createBoundObjectForm(new BlogPost, 'edit');

    if ($form->isBound() && $form->isValid()) {
        // do some stuffs with $blogPost

        return $this->redirectToRoute('app_blogpost_index');
    }

    return ['form' => $form->createView()];
}

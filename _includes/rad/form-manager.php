<?php

/**
 * You don't even have to create a form type!
 */
public function editAction()
{
    $form = $this->createBoundObjectForm(new BlogPost, 'edit');

    if ($form->isBound() && $form->isValid()) {
        // do some stuffs with $blogPost

        return $this->redirectToUrl('app_blogpost_index');
    }

    return array(
        'form' => $form->createView(),
    );
}

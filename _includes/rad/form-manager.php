<?php

public function newAction()
{
    $form = $this->createBoundObjectForm(new BlogPost, 'new');

    if ($form->isBound() && $form->isValid()) {
        $this->flush();
        $this->addFlash('success');

        return $this->redirectToRoute('app_blogposts_index');
    }

    return ['form' => $form->createView()];
}

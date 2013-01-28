<?php

public function editAction()
{
    $form = $this->createBoundObjectForm(new BlogPost, 'edit');

    if ($form->isBound() && $form->isValid()) {
        $this->flush();
        $this->addFlash('info');

        return $this->redirectToRoute('app_blogpost_index');
    }

    return ['form' => $form->createView()];
}

<?php

public function editAction()
{
    $blogPost = new BlogPost();
    $form = $this->createForm(new EditBlogPostType(), $blogPost);

    return $this->render('MyBundle:Default:edit.html.twig', array(
        'form' => $form->createView(),
    );
}

public function updateAction(Request $request)
{
    $blogPost = new BlogPost();
    $form = $this->createForm(new EditBlogPostType(), $blogPost);
    $form->bindRequest($request);

    if ($form->isValid()) {
        $this->getDoctrine()->getManager()->flush();
        $this->getRequest()
            ->getSession()
            ->getFlashBag()
            ->add('success', 'app_edit.success')
        ;

        return $this->redirect(
            $this->generateUrl('blogpost_index')
        );
    }

    return $this->render('MyBundle:Default:edit.html.twig', array(
        'form' => $form->createView(),
    );
}

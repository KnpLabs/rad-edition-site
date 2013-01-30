<?php

public function newAction()
{
    $blogPost = new BlogPost();
    $form = $this->createForm(new EditBlogPostType(), $blogPost);

    return $this->render('App:BlogPosts:new.html.twig', array(
        'form' => $form->createView(),
    );
}

public function createAction(Request $request)
{
    $blogPost = new BlogPost();
    $form = $this->createForm(new EditBlogPostType(), $blogPost);
    $form->bindRequest($request);

    if ($form->isValid()) {
        $this->getDoctrine()->getManager()->flush();
        $this->getRequest()
            ->getSession()
            ->getFlashBag()
            ->add('success', 'app_blogposts_new.success')
        ;

        return $this->redirect(
            $this->generateUrl('app_blogposts_index')
        );
    }

    return $this->render('App:BlogPosts:new.html.twig', array(
        'form' => $form->createView(),
    );
}

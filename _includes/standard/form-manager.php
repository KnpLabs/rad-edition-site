<?php

public function newAction(Request $request)
{
    $blogPost = new BlogPost();
    $form = $this->createForm(new NewBlogPostType(), $blogPost);

    if (!$request->isMethodSafe()
        && $form->bindRequest($request)->isValid()
       ) {
        $this->getDoctrine()->getManager()->persist($blogPost);
        $this->getDoctrine()->getManager()->flush();
        $request->getSession()
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

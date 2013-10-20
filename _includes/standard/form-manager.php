<?php

public function newAction(Request $request)
{
    $post = new BlogPost();
    $form = $this->createForm(new NewBlogPostType(), $post);

    if (!$request->isMethodSafe() && $form->handleRequest($request) && $form->->isValid()) {
        $this->getDoctrine()->getManager()->persist($post);
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

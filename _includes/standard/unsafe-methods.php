<?php

public function deleteAction(Request $request, $id)
{
    $token = $request->request->get('_token');

    if (!$this->get('form.csrf_provider')->isCsrfTokenValid(
        'link',
        $token
    )) {
        throw new \InvalidArgumentException(
            'The CSRF token is invalid.' .
            'Please try to resubmit the form.'
        );
    }

    $em = $this->getDoctrine()->getManager();
    $blogPost = $em
        ->getRepository('App:Blogpost')
        ->find($id);

    if (null === $post) {
        throw $this->createNotFoundException(
            'Resource not found'
        );
    }

    $em->remove($blogPost);
    $em->flush();

    return $this->redirect(
        $this->generateUrl('app_blogposts_index')
    );
}

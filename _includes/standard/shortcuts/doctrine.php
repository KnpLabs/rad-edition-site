<?php

$post = $this->getDoctrine()
    ->getManager()
    ->getRepository('App:BlogPost')
    ->find($id)
;

if (null === $post) {
    throw $this->createNotFoundException('Resource not found');
}

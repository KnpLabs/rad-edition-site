<?php

$post = $this->getDoctrine()
    ->getRepository('App:BlogPost')
    ->find($id)
;

if (null === $post) {
    throw $this->createNotFoundException('Resource not found');
}

<?php

if (!$this->get('security.context')->isGranted(['POST_OWNER'], $post)) {
    throw new AccessDeniedHttpException('Access Denied');
}

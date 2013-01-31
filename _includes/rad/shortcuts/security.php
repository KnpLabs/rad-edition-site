<?php

if (!$this->isGranted(['POST_OWNER'], $post)) {
    throw $this->createAccessDeniedException();
}

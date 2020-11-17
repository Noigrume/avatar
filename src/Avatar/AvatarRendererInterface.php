<?php

namespace Avatar;

interface AvatarRendererInterface {

    public function render(AvatarMatrixInterface $matrix);
}
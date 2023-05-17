<?php

namespace Amsiam\BulkSmsBD;

interface BulkSmsBDInterface
{
    public function send(array $data);
}

<?php

namespace LHP\Services\Events\POS;

use LHP\Services\Events\Contracts\ServiceEvent;

class BranchDeleted implements ServiceEvent
{
    private $ssoBranchId;
    private $posBranchId;
    
    public function __construct(?int $ssoBranchId, ?int $posBranchId)
    {
        $this->ssoBranchId = $ssoBranchId;
        $this->posBranchId = $posBranchId;
    }
    
    public function toArray(): array
    {
        return [
            'ssoBranchId' => $this->ssoBranchId,
            'posBranchId' => $this->posBranchId,
        ];
    }
}
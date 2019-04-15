<?php

namespace LHP\Services\Commands\POS;

use LHP\Services\Commands\ServiceCommand;
use LHP\Services\Events\POS\BranchDeleted;

class DeleteBranch extends ServiceCommand
{
    private $ssoBranchId;
    
    public function __construct(int $ssoBranchId)
    {
        $this->ssoBranchId = $ssoBranchId;
    }

    public function expects(): string
    {
        return BranchDeleted::class;
    }
    
    public function payload(): array
    {
        return [
            'ssoBranchId' => $this->ssoBranchId,
        ];
    }
}
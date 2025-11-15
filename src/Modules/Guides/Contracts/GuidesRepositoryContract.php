<?php

namespace Modules\Guides\Contracts;

use Illuminate\Support\Collection;

interface GuidesRepositoryContract
{
    /**
     * @return Collection
     */
    public function getAvailableGuides(): Collection;
}

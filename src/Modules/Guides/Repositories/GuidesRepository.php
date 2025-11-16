<?php

namespace Modules\Guides\Repositories;

use Illuminate\Support\Collection;
use Modules\Guides\Models\Guide;

class GuidesRepository
{
    /**
     * @return Collection
     */
    public function getAvailableGuides(): Collection
    {
        return Guide::active()
            ->select(['id', 'name', 'experience_years'])
            ->get();
    }
}

<?php

namespace Modules\Guides\Repositories;

use Modules\Guides\Models\Guide;
use Illuminate\Support\Collection;
use Modules\Guides\Contracts\GuidesRepositoryContract;

class GuidesRepository implements GuidesRepositoryContract
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

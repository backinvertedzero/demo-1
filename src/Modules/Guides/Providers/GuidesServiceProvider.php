<?php

namespace Modules\Guides\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Guides\Contracts\GuidesRepositoryContract;
use Modules\Guides\Repositories\GuidesRepository;

class GuidesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            GuidesRepositoryContract::class,
            GuidesRepository::class
        );
    }
}

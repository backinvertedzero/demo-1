<?php

namespace Modules\Guides\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Guides\Contracts\GuidesRepositoryContract;
use Modules\Guides\Exceptions\EmptyGuideException;
use Modules\Guides\Http\Resources\GuideResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GuideController extends Controller
{
    /**
     * @param GuidesRepositoryContract $repositoryContract
     * @return AnonymousResourceCollection
     * @throws EmptyGuideException
     */
    public function index(GuidesRepositoryContract $repositoryContract): AnonymousResourceCollection
    {
        $guides = $repositoryContract->getAvailableGuides();

        if ($guides->isEmpty()) {
            throw new EmptyGuideException('There are no guide found.');
        }

        return GuideResource::collection($guides);
    }
}

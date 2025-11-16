<?php

namespace Modules\Guides\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Guides\Contracts\GuidesRepositoryContract;
use Modules\Guides\Exceptions\EmptyGuideListException;
use Modules\Guides\Http\Resources\GuideResource;

class GuideController extends Controller
{
    /**
     * @param GuidesRepositoryContract $repositoryContract
     * @return AnonymousResourceCollection
     * @throws EmptyGuideListException
     */
    public function index(GuidesRepositoryContract $repositoryContract): AnonymousResourceCollection
    {
        $guides = $repositoryContract->getAvailableGuides();

        if ($guides->isEmpty()) {
            throw new EmptyGuideListException('There are no guide found.');
        }

        return GuideResource::collection($guides);
    }
}

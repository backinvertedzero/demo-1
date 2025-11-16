<?php

namespace Modules\Guides\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Guides\Repositories\GuidesRepository;
use Modules\Guides\Exceptions\EmptyGuideListException;
use Modules\Guides\Http\Resources\GuideResource;

class GuideController extends Controller
{
    /**
     * @param GuidesRepository $repositoryContract
     * @return AnonymousResourceCollection
     * @throws EmptyGuideListException
     */
    public function index(GuidesRepository $repositoryContract): AnonymousResourceCollection
    {
        $guides = $repositoryContract->getAvailableGuides();

        if ($guides->isEmpty()) {
            throw new EmptyGuideListException('There are no guide found.');
        }

        return GuideResource::collection($guides);
    }
}

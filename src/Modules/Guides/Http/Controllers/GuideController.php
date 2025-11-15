<?php

namespace Modules\Guides\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Guides\Exceptions\EmptyGuideException;
use Modules\Guides\Http\Resources\GuideResource;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GuideController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     * @throws EmptyGuideException
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $guides = Guide::active()->get();

        if ($guides->isEmpty()) {
            throw new EmptyGuideException('There are no guide found.');
        }

        return GuideResource::collection($guides);
    }
}

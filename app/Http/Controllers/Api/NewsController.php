<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Http\Resources\NewsResource;
use App\Services\NewsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NewsController extends Controller
{
    public function __construct(private readonly NewsService $newsService)
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index(): AnonymousResourceCollection
    {
        return $this->newsService->index();
    }

    public function store(CreateRequest $request): NewsResource
    {
        return $this->newsService->store($request->validated());
    }

    public function show(string $id): NewsResource
    {
        return $this->newsService->show($id);
    }

    public function update(UpdateRequest $request, string $id): NewsResource
    {
        return $this->newsService->update($request->validated(), $id);
    }

    public function destroy(string $id): JsonResponse
    {
        return $this->newsService->destroy($id);
    }
}

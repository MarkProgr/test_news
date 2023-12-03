<?php

namespace App\Services;

use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Http\Resources\NewsResource;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NewsService
{
    public function __construct(private readonly NewsRepositoryInterface $repository)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return NewsResource::collection($this->repository->getAll());
    }

    public function show(string $id): NewsResource
    {
        return new NewsResource($this->repository->getById($id));
    }

    public function store(mixed $data): NewsResource
    {
        return new NewsResource($this->repository->create($data));
    }

    public function update(mixed $data, string $id): NewsResource
    {
        return new NewsResource($this->repository->update($id, $data));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return response()->json(
            'Deleted',
            204
        );
    }
}

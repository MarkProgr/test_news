<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NewsRepository implements NewsRepositoryInterface
{
    public function __construct(private readonly News $news)
    {
    }

    public function getAll(): Collection
    {
        return $this->news->newQuery()->get();
    }

    /**
     * @param array<mixed> $data
     * @return Model|Builder|News
     */
    public function create(mixed $data): Model|Builder|News
    {
        return $this->news->newModelQuery()->create($data);
    }

    /**
     * @param string $id
     * @param array<mixed> $data
     * @return Model|Collection|Builder|News|array<mixed>|null
     */
    public function update(string $id, mixed $data): Model|Collection|Builder|News|array|null
    {
        $newsForUpdate = $this->news->newModelQuery()->findOrFail($id);
        return tap($newsForUpdate)->update($data);
    }

    public function destroy(string $id): void
    {
        $newsById = $this->news->newModelQuery()->findOrFail($id);
        $newsById->delete();
    }

    /**
     * @param string $id
     * @return Model|Collection|Builder|array<mixed>|null
     */
    public function getById(string $id): Model|Collection|Builder|array|null
    {
        return $this->news->newModelQuery()->findOrFail($id);
    }
}

<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface NewsRepositoryInterface
{
    public function getAll(): Collection;

    /**
     * @param mixed $data
     * @return Model|Builder|News
     */
    public function create(mixed $data): Model|Builder|News;

    /**
     * @param string $id
     * @param mixed $data
     * @return Model|Collection|Builder|News|array<mixed>|null
     */
    public function update(string $id, mixed $data): Model|Collection|Builder|News|array|null;
    public function destroy(string $id): void;

    /**
     * @param string $id
     * @return Model|Collection|Builder|array<mixed>|null
     */
    public function getById(string $id): Model|Collection|Builder|array|null;
}

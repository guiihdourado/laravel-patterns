<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

use App\Contracts\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
     protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns all data in the repository
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Returns a given
     *
     * @param int $id
     * @return Model
     */
    public function getById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Store a newly created resource in storage.
     * @param  array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Store a newly created resource in storage.
     * @param  array $attributes
     * @return bool
     */
    public function createMany(array $attributes): bool
    {
        return $this->model->insert($attributes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $request
     * @param  int $id
     * @return Model
     */
    public function update(array $request, int $id): Model
    {
        $model = $this->getById($id);

        $model->fill($request);

        $model->save();

        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->model->destroy($id);
    }
}

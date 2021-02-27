<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * Returns all data in the repository
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Returns a given
     *
     * @param int $id
     * @return Model
     */
    public function getById(int $id): ?Model;

    /**
     * Store a newly created resource in storage.
     * @param  array $request
     * @return Model
     */
    public function create(array $request): Model;

    /**
     * Store a newly created resource in storage.
     * @param  array $attributes
     * @return bool
     */
    public function createMany(array $attributes): bool;

    /**
     * Update the specified resource in storage.
     *
     * @param  array $request
     * @param  int $id
     * @return Model
     */
    public function update(array $request, int $id): Model;

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy(int $id): void;
}

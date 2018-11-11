<?php

namespace App\Repository;


interface RepositoryInterface
{
    /**
     * Function returns all data from DB
     */
    public function findAll(array $columns = ['*']);

    /**
     * Creates new record in DB
     */
    public function create(array $data);

    /**
     * Updates record in DB
     */
    public function update(array $data, $id);

    /**
     * Deletes record from DB based on it ID
     *
     * @param int|string $id
     */
    public function delete($id);
}
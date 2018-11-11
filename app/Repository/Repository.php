<?php

namespace App\Repository;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;


abstract class Repository implements RepositoryInterface
{

    protected $app;

    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     */
    abstract public function model(): string;


    /**
     * Inits model
     *
     * @throws \Exception
     */
    public function makeModel(): Model
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an "
                . "instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }


    public function findAll(array $columns = ['*'])
    {
        return $this->findBy([], $columns);
    }


    public function create(array $data)
    {
        return $this->model->create($data);
    }


    public function update(array $data, $id, string $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }


    public function delete($id): int
    {
        return $this->model->destroy($id);
    }
}
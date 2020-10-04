<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function getAll($req)
    {
        $data = $this->model->query();

        if ($req->keyword) {
            $data = $data->where('title', 'like', "%{$req->keyword}%")
                            ->orWhere('description', 'like', "%{$req->keyword}%");
        }

        if ($req->perPage) {
            $data = $data->paginate($req->perPage);
        } else {
            $data = $data->paginate(10);
        }

        return $data;
    }


    public function find($id)
    {
        $data = $this->model->where('id', $id);

        $data = $data->first();

        return $data;
    }

    public function store($req)
    {
        $newRecord = $this->model->create($req);
        return $newRecord;
    }

    public function update($req, $id)
    {
        $data = $this->model->find($id);
        $data->update($req);

        return $data;
    }

    public function delete($id)
    {
        $data = $this->model->find($id);

        if ($data) {
            $data->delete();
        }

        return $data;
    }
}

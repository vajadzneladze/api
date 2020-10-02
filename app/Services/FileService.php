<?php

namespace App\Services;

use App\Models\File;

class FileService
{
    protected $model;

    public function __construct(File $model)
    {
        $this->model = $model;
    }

    public function getAll($req)
    {
        $data = $this->model->query();

        if ($req->keyword) {
            $data = $data->where('title', 'like', "%{$req->keyword}%")
                            ->orWhere('abbreviation', 'like', "%{$req->keyword}%");
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
        $data = $this->model->find($id);

        return $data;
    }

    public function store($request)
    {
        $data = $request->only([
            'file',
            'module'
        ]);

        if ($request->file()) {
            $fileName      = time().'_'.$request->file->getClientOriginalName();
            $filePath      = $request->file('file')->storeAs('uploads/'.$request->module, $fileName, 'public');
            $fileExtension = $request->file->getClientOriginalExtension();

            $data['name']   = $fileName;
            $data['path']   = '/storage/'.$filePath;
            $data['format'] = $fileExtension;
            $data['module'] = $request->module;
        }

        $newRecord = $this->model::create($data);

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

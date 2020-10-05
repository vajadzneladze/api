<?php

namespace App\Services;

use App\Models\Slide;

class SlideService
{
    protected $model;
    protected $fileService;

    public function __construct(Slide $model, FileService $file)
    {
        $this->model = $model;
        $this->fileService = $file;
    }

    public function getAll($req, $lang)
    {
        $local_id =  \App('language')[$lang];
        $data = $this->model->with('lang', 'img');

        if ($local_id) {
            $data = $data->where('local_id', $local_id);
        }

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

    public function find($lang, $itemId)
    {
        $local_id =  \App('language')[$lang];

        $data = $this->model->with('lang', 'img')
            ->where('item_id', $itemId);

        if ($local_id) {
            $data = $data->where('local_id', $local_id);
        }

        $data = $data->first();

        return $data;
    }

    public function store($req, $lang)
    {
        $local_id =  \App('language')[$lang];

        if ($local_id) {
            $req['local_id'] = $local_id;
        }

        $file_id = $this->fileService->find($req['fileId']);

        if ($file_id) {
            $req['file_id'] = $file_id->id;
        }

        $newRecord = $this->model->create($req);

        if (!$newRecord->item_id) {
            $newRecord->item_id = $newRecord->id;
            $newRecord->save();
        }

        return $newRecord;
    }

    public function update($req, $lang, $itemId)
    {
        $local_id =  \App('language')[$lang];

        $data = $this->model
            ->where('item_id', $itemId)
            ->where('local_id', $local_id)
            ->first();

        if (!$data) {
            $req['item_id'] = $itemId;

            $file_id = $this->fileService->find($req['fileId']);

            if ($file_id) {
                $req['file_id'] = $file_id->id;
            }

            return $this->store($req, $lang);
        }

        $file_id = $this->fileService->find($req['fileId']);

        if ($file_id) {
            $req['file_id'] = $file_id->id;
        }


        $data->update($req);

        return $data;
    }

    public function delete($lang, $itemId)
    {
        $local_id =  \App('language')[$lang];


        $data = $this->model
            ->where('item_id', $itemId)
            ->where('local_id', $local_id)
            ->first();

        if ($data) {
            $data->delete();
        }

        return $data;
    }
}

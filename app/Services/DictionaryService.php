<?php

namespace App\Services;

use App\Models\Dictionary;

class DictionaryService
{
    protected $model;

    public function __construct(Dictionary $model)
    {
        $this->model = $model;
    }

    public function getAll($req, $lang)
    {
        $local_id =  \App('language')[$lang];
        $data = $this->model->with('lang')->orderBy('key');

        if ($local_id) {
            $data = $data->where('local_id', $local_id);
        }

        if ($req->keyword) {
            $data = $data->where('key', 'like', "%{$req->keyword}%")
                ->orWhere('module', 'like', "%{$req->keyword}%");
        }

        if ($req->perPage) {
            $data = $data->paginate($req->perPage);
        } else {
            $data = $data->paginate(10);
        }

        return $data;
    }


    public function getAllRecord($lang)
    {
        $local_id =  \App('language')[$lang];
        $data = $this->model->with('lang');

        if ($local_id) {
            $data = $data->where('local_id', $local_id);
        }

        $data = $data->get();
        return $data;
    }




    public function find($lang, $itemId)
    {
        $local_id =  \App('language')[$lang];


        $data = $this->model->with('lang')->where('item_id', $itemId);

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
            return $this->store($req, $lang);
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

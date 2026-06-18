<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;

public function index(Request $request)
{
    $items = $this->svc
        ->all()
        ->filter(fn($item) =>
            !$request->category_id ||
            $item->category_id == $request->category_id
        )
        ->values();

    return $this->success($items);
}

class ItemController extends BaseController
{
    protected ItemService $svc;

    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return $this->success(
            $this->svc->all(),
            'Data item berhasil ditampilkan'
        );
    }

    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());

        return $this->success(
            $item,
            'Item berhasil dibuat',
            201
        );
    }

    public function show($id)
    {
        try {
            $item = $this->svc->find($id);

            return $this->success(
                $item,
                'Detail item berhasil ditampilkan'
            );
        } catch (\Exception $e) {
            return $this->error(
                'Item tidak ditemukan',
                404
            );
        }
    }

    public function update(UpdateItemRequest $req, $id)
    {
        try {
            $item = $this->svc->update($id, $req->validated());

            return $this->success(
                $item,
                'Item berhasil diperbarui'
            );
        } catch (\Exception $e) {
            return $this->error(
                'Item tidak ditemukan',
                404
            );
        }
    }

    public function destroy($id)
    {
        try {
            $this->svc->delete($id);

            return $this->success(
                null,
                'Item berhasil dihapus',
                204
            );
        } catch (\Exception $e) {
            return $this->error(
                'Item tidak ditemukan',
                404
            );
        }
    }
}
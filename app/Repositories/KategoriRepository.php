<?php

namespace App\Repositories;

use App\Interfaces\KategoriRepositoryInterface;

use App\Models\Kategori;

/**
 * code by: github @septiana25, ian septiana 
 * date: 2025-08-14
 */

class KategoriRepository implements KategoriRepositoryInterface
{
    public function getAll()
    {
        return Kategori::all();
    }
    public function findById($id)
    {
        return Kategori::findOrFail($id);
    }
    public function create(array $data)
    {
        return Kategori::create($data);
    }
    public function update($id, array $data)
    {
        $model = Kategori::findOrFail($id);
        $model->update($data);
        return $model;
    }
    public function delete($id)
    {
        return Kategori::destroy($id);
    }
}

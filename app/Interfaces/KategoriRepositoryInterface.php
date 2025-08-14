<?php

namespace App\Interfaces;

/**
 * code by: github @septiana25, ian septiana 
 * date: 2025-08-14
 */

interface KategoriRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

<?php

namespace App\Services;

use App\Interfaces\KategoriRepositoryInterface;

/**
 * code by: github @septiana25, ian septiana 
 * date: 2025-08-14
 */

class KategoriService
{
    protected $kategoriRepo;

    public function __construct(KategoriRepositoryInterface $kategoriRepo)
    {
        $this->kategoriRepo = $kategoriRepo;
    }
    public function getAll()
    {
        return $this->kategoriRepo->getAll();
    }
}

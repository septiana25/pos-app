<?php

namespace App\Http\Controllers;

use App\Services\KategoriService;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $kategoriService;
    public function __construct(KategoriService $kategoriService){
        $this->kategoriService = $kategoriService;
    }

    public function index(){
        $kategori =  $this->kategoriService->getAll();
        dd($kategori);
    }
}

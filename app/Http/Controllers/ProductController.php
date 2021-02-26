<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->all();
    }

    public function store(Request $request)
    {
        return $this->productRepository->create($request->all());
    }
}

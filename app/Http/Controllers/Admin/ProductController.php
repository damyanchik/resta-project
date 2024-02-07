<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Repositories\ProductRepository;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function index(IndexRequest $request): View
    {
        $products = $this->productRepository->searchAndSort($request->data());

        return View('admin.product.index', [
            'products' => $products
        ]);
    }
}

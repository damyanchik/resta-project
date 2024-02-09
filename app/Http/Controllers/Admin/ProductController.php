<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    {
    }

    public function index(IndexRequest $request): View
    {
        return View('admin.product.index', [
            'products' => $this->productRepository->getDataForIndex($request->data())
        ]);
    }

    public function create(): View
    {
        return View('admin.product.create');
    }

    public function store(StoreProductRequest $storeProductRequest): RedirectResponse
    {
        try {
            $this->productRepository->create($storeProductRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()
            ->route('admin.product.index')
            ->with('message', 'Record created successfully.');
    }

    public function edit(int $id): View
    {
        return View('admin.product.edit', [
            'product' => $this->productRepository->getById($id)
        ]);
    }

    public function update(UpdateProductRequest $updateProductRequest, int $id): RedirectResponse
    {
        try {
            $this->productRepository->update($id, $updateProductRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return back()->with('message', 'Record updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->productRepository->delete($id);
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()->route('admin.product.index')->with('message', 'Record deleted successfully.');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function index(IndexRequest $request): View
    {
        return view('admin.category.index', [
            'categories' => $this->categoryRepository->getDataForIndex($request->data())
        ]);
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $storeCategoryRequest): RedirectResponse
    {
        try {
            $this->categoryRepository->create($storeCategoryRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()->route('admin.user.index')->with('message', 'Record successfully created');
    }

    public function edit(int $id): View
    {
        return view('admin.category.edit', [
            'category' => $this->categoryRepository->getById($id)
        ]);
    }

    public function update(UpdateCategoryRequest $updateCategoryRequest, int $id): RedirectResponse
    {
        try {
            $this->categoryRepository->update($id, $updateCategoryRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return back()->with('message', 'Record successfully updated');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->categoryRepository->delete($id);
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()->route('admin.category.index')->with('message', 'Record successfully deleted');
    }
}

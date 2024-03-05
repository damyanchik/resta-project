<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(private OrderRepositoryInterface $orderRepository)
    {
    }

    public function index(IndexRequest $request): View
    {
        return view('admin.orderDirection.index', [
            'orders' => $this->orderRepository->getDataForIndex($request->data())
        ]);
    }

    public function create(): View
    {
        return view('admin.orderDirection.create');
    }

    public function store(StoreOrderRequest $storeOrderRequest): RedirectResponse
    {
        try {
            $this->orderRepository->create($storeOrderRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()
            ->route('admin.orderDirection.index')
            ->with('message', 'Record created successfully.');
    }

    public function edit(int $id): View
    {
        return view('admin.orderDirection.edit', [
            'orderDirection' => $this->orderRepository->getById($id)
        ]);
    }

    public function update(UpdateOrderRequest $updateOrderRequest, int $id): RedirectResponse
    {
        try {
            $this->orderRepository->update($id, $updateOrderRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return back()->with('message', 'Record updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->orderRepository->delete($id);
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()->route('admin.orderDirection.index')->with('message', 'Record deleted successfully.');
    }
}

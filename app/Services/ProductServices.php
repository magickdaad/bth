<?php

namespace App\Services;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductServices
{
    public function storeProduct(ProductStoreRequest $request): RedirectResponse
    {
        $product = $request->validated();
        $product['data'] = $request->input('data') !== null
            ? $this->sortData($request->input('data'))
            : null;
        Product::create($product);
        return redirect('products');
    }


    public function updateProduct(Product $product, ProductUpdateRequest $request): RedirectResponse|View
    {
        !$this->checkPermission() ?
            $product->update(
                $request->safe()->merge(['data' => $this->sortData($request->input('data'))])->except(['article'])
            ) :
            $product->update($request->validated()->merge(['data' => $this->sortData($request->input('data'))]));
        return redirect()->route('products.show', $product->id);
    }

    private function checkPermission(): bool
    {
        $role = config('products.role');
        return in_array(Auth::user()->id, $role['admin']);
    }

    private function sortData(array $data): array
    {
        $sortData = [];
        foreach ($data['name'] as $name) {
            foreach ($data['value'] as $value) {
                $sortData[$name] = $value;
            }
        }
        return $sortData;
    }
}

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
        Product::create($request->validated());
        return redirect('products');
    }


    public function updateProduct(Product $product, ProductUpdateRequest $request): RedirectResponse|View
    {
        $productData = $this->checkPermission()
            ? $request->validated()
            : $request->safe()->except(['article']);

        $product->update($productData);

        return redirect()->route('products.show', $product->id);
    }

    private function checkPermission(): bool
    {
        $role = config('products.role');
        return in_array(Auth::user()->id, $role['admin']);
    }

}

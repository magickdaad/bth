<?php

namespace App\Observers;

use App\Jobs\CreateProduct;
use App\Models\Product;

class ProductObserver
{

    public function created(Product $product): void
    {
        CreateProduct::dispatch($product)->onQueue('emails');
    }

}

<?php

namespace App\Observers;

use App\Jobs\SendEmail;
use App\Models\Product;

class ProductObserver
{

    public function created(Product $product): void
    {
        SendEmail::dispatch($product)->onQueue('emails');
    }

}

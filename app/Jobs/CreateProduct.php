<?php

namespace App\Jobs;

use App\Models\Product;
use App\Notifications\ProductCreate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class CreateProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private Product $product
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::route('mail', config('products.email'))->notify(new ProductCreate($this->product));
    }
}

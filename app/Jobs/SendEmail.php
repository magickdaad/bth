<?php

namespace App\Jobs;

use App\Models\Product;
use App\Notifications\ProductCreateNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly Product $product
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::route('mail', config('products.email'))->notify(new ProductCreateNotification($this->product));
    }
}

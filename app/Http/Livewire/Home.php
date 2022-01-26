<?php

namespace App\Http\Livewire;

use App\Models\ActivityLog;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{   
    public $products = [];
    public $activityLogs = [];

    public function mount()
    {
        $this->products = Product::get();
        $this->activityLogs = ActivityLog::get();
    }

    public function render()
    {
        return view('livewire.home');
    }

    public function makeProduct()
    {
        $product = new Product([
            'name' => 'Test',
            'price' => 300 
        ]);
        $product->save();
    }
}

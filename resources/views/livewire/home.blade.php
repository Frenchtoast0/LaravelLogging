<div class="p-20">
    Products<button wire:click="makeProduct" class="border bg-blue-200 rounded">Make Product</button>
    @foreach ($products as $product)
        <div class="border mb-1">{{$product->id}} {{$product->name}}</div>
    @endforeach
</div>
<div class="p-20">
    Activity Logs
    @foreach ($activityLogs as $log)
        <div class="border mb-1">{{$log->user}} {{$log->type}} {{$log->description}}</div>
    @endforeach
</div>
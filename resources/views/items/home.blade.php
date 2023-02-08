<x-layout>
    <div class="container mt-5 pt-5">
        <h1 class="text-center mb-5 pb-5">{{ __('home.explore_products') }}</h1>
        <div class="row mt-5">
            @unless (count($items) == 0) @foreach($items as $item)
            <div class="col-md-3">
                <x-item-card :item="$item" />
            </div>
            @endforeach @else
            <p class="mb-5">{{ __('home.no_items') }}</p>
            @endunless
        </div>
        <div class="mt-2 p-1">{{$items->links()}}</div>
    </div>
</x-layout>

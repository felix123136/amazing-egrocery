<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img
                    src="{{ asset($item-> picture) }}"
                    alt="{{ $item->name }}"
                    class="w-100"
                />
            </div>
            <div class="col-md-6">
                <h1 class="mb-4">{{ $item->name }}</h1>
                <strong
                    >{{ __('show.price') }} Rp.{{ number_format($item->price)
                    }}</strong
                >
                <p>{{ $item->description }}</p>
                @if(session()->has('cart.' . $item->id))
                <a href="/cart" class="btn btn-dark"
                    >{{ __('show.go_to_cart') }}</a
                >
                @elseif($isOutOfStock)
                <button class="btn btn-dark px-4" disabled>
                    {{ __('show.out_of_stock') }}
                </button>
                @else
                <form action="/items/{{$item->id}}/add-to-cart" method="post">
                    @csrf
                    <button class="btn btn-warning px-4">
                        {{ __('show.buy') }}
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-layout>

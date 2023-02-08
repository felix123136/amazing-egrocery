<x-layout>
    <style>
        .cart-thumbnail {
            object-fit: contain;
            height: 75px;
            border-radius: 50%;
        }
    </style>
    <div class="container my-5" style="min-height: 53vh">
        <h2 class="text-center mb-4">{{ __('cart.title') }}</h2>
        @if (count($items) > 0)
        <table class="table table-striped">
            <tbody>
                @php $grandTotal = 0; @endphp @foreach($items as $item)
                <tr>
                    <form action="/cart/{{$item->id}}" method="POST">
                        @csrf
                        <td>
                            <div class="d-flex align-items-center">
                                <img
                                    src="{{$item-> picture}}"
                                    alt="{{$item->name}}"
                                    class="img-thumbnail cart-thumbnail me-3"
                                />
                                <p>{{ $item->name }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{ __('cart.price') }}
                                {{number_format($item->price)}}
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger">
                                {{ __('cart.remove_from_cart') }}
                            </button>
                        </td>
                    </form>
                </tr>
                @php $grandTotal += $item->price; @endphp @endforeach
            </tbody>
        </table>
        @else
        <p
            class="text-center d-flex justify-content-center"
            style="min-height: 53vh"
        >
            {{ __('cart.empty') }}
        </p>
        @endif @if (count($items) > 0)
        <div class="text-right mr-4 my-3 d-flex justify-content-between">
            <form method="POST" action="/checkout" class="d-inline">
                @csrf
                <button class="btn btn-primary">
                    {{ __('cart.checkout') }}
                </button>
            </form>
            <p>
                <strong
                    >{{ __('cart.grand_total') }}
                    {{number_format($grandTotal)}}</strong
                >
            </p>
        </div>
        @endif
    </div>
</x-layout>

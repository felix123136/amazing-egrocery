<x-layout>
    <style>
        .circle {
          width: 400px;
          height: 400px;
          border-radius: 50%;
          border: 10px solid gold;
          background-color: white;
          display: flex;
          align-items: center;
          justify-content: center;
          margin: 6vh auto;
        }
      </style>
    <div class="circle">
      <div class="text-center">
          <h2>{{ __('checkout.success') }}</h2>
          <h6>{{ __('checkout.contact') }}</h6>
          <a href="/home">{{ __('checkout.back_to_home') }}</a>
      </div>
    </div>
</x-layout>
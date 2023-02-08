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
        <div>
          <h2 class="text-center">@lang('saved.saved')</h2>
          <a href="/home">@lang('saved.click_here_to_home')</a>
        </div>
      </div>
</x-layout>
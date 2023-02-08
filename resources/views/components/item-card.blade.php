<div class="card mb-3">
    <img
        src="{{ asset($item->picture) }}"
        class="card-img-top"
        alt="{{ $item->name }}"
    />
    <div class="card-body">
        <h6 class="card-title course-card-title text-decoration-none">{{ $item->name }}</h6>
        <a href="/items/{{$item->id}}" class="btn btn-primary mt-1">{{ __('item-card.details') }}</a>
    </div>
</div>

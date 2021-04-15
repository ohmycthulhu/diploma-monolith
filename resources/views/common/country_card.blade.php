<a class="d-block"
   href="{{ route('search', ['country' => $country->slug]) }}">
    <div class="min-height-240 rounded-border px-4 py-5 bg-img-hero transition-3d-hover gradient-overlay-half-bg-gradient-v2 gradient-overlay shadow-hover-2 dropdown"
         style="background-image: url(/storage/{{ $country->image }});">
        <header class="w-100 d-flex justify-content-between">
            <div class="position-relative">
                <h5 class="text-white font-weight-bold font-size-17 mb-1 text-lh-2 d-block">
                    {{ $country->name }}</h5>
            </div>
        </header>
    </div>
</a>
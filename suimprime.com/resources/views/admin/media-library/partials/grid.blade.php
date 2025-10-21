@if ($media->count())
    <div class="row">
        @foreach ($media as $item)
            <div class="col-md-3 mb-3">
                <div class="card media-item" data-url="{{ asset('storage/' . $item->url) }}">
                    @if ($item->type === 'image')
                        <img class="img-fluid object-fit-cover cursor-pointer" src="{{ asset('storage/' . $item->url) }}"
                            style="width: 10rem; height: 10rem;" loading="lazy">
                    @elseif($item->type === 'video')
                        <video width="100%" height="120" controls>
                            <source src="{{ asset('storage/' . $item->url) }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-center text-muted">No media found.</p>
@endif

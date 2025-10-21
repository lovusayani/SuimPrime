<div class="row gx-2 gy-2">
    @foreach ($media as $m)
        <div class="col-3">
            <div class="card media-item" data-id="{{ $m->id }}" data-url="{{ $m->url }}"
                style="cursor:pointer;">
                <div class="card-body p-1 text-center">
                    @if ($m->type === 'image')
                        <img src="{{ $m->url }}" class="img-fluid" alt="{{ $m->title }}"
                            style="height:110px; object-fit:cover;">
                    @else
                        <div
                            style="height:110px;display:flex;align-items:center;justify-content:center;background:#111;color:#fff;">
                            <i class="ph ph-play-circle" style="font-size:28px"></i>
                        </div>
                    @endif
                    <div class="mt-1 small text-truncate">{{ $m->title ?? '—' }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-3">
    {{ $media->links() }}
</div>

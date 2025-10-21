<div class="modal fade modal-xl" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Media library grid here -->
                @foreach ($media as $m)
                    <div class="iq-media-images">
                        @if ($m->type === 'image')
                            <img src="{{ $m->url }}" class="img-fluid cursor-pointer">
                        @else
                            <video class="img-fluid" controls>
                                <source src="{{ $m->url }}">
                            </video>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

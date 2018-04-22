<!-- Modal -->
<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" role="dialog"
     aria-labelledby="{{ $modal_label }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modal_label }}">{{ $modal_title
                }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $modal_body }}
            </div>
            <div class="modal-footer">
                {{ $modal_footer }}
            </div>
        </div>
    </div>
</div>
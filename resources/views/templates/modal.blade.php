<div class="modal fade" id="{{ $id_modal }}">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable {{ $modal_size ?? '' }}">
    <div class="modal-content">
      <form action="{{ $form_action ?? '' }}" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">{{ $modal_title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ $slot }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          @isset($modal_submit)
          <button type="submit" class="btn btn-{{ $modal_color ?? 'success' }}">{{ $modal_submit }}</button>
          @endisset
        </div>
      </form>
    </div>
  </div>
</div>
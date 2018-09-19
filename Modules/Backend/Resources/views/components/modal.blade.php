@if(empty($type) || $type=='default')
    <div class="modal fade" id="modal-danger">
@else
    <div class="modal modal-{{ $type }} fade" id="modal-danger">
@endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $title??'Modal title' }}</h4>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{ $txt_cancel??'Cancel' }}</button>
                <button type="button" class="btn btn-outline {{ $cls_ok??'btn_ok' }}">{{ $txt_ok??'Save' }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
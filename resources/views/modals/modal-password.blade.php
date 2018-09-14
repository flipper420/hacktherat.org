<!-- Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-5 bg-danger">
                <h4 class="modal-title" id="passwordModalLabel">{{trans('modals.password_modal_default_title')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <h4>{{trans('modals.password_modal_default_message')}}</h4>
            </div>
            <div class="modal-footer bg-danger p-5">
                <button type="button" class="btn btn-warning btn-md"
                        data-dismiss="modal">{{trans('modals.password_modal_button_cancel_text')}}</button>
                <button id="confirm" type="button"
                        class="btn btn-success btn-md">{{trans('modals.password_modal_button_confirm_text')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="url" method="">
                @csrf
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">title</h4>
                </div>
                <div class="modal-body">
                    <p>message</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Ok</button>
                </div>

                <input type="hidden" name="name" value="value">
            </form>
        </div>
    </div>
</div>
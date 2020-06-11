@if(session()->has('errors'))
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-text">{{session("errors")->first()}}</div>
        <div class="alert-close">
            <button type="button" class="close" style="margin-top: -1.25rem;"
                    data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="zmdi zmdi-close-circle"></i></span>
            </button>
        </div>
    </div>
@endif

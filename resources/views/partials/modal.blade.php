
<div
        class="modal loading {{ $animation or 'fade' }} {{ $class or '' }}"
        id="{{ $id or 'modal' }}"
>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @isset($title)
                <div class="modal-header">

                    <h1 class="modal-title">{{ $title }}</h1>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endisset
                <input type="hidden" id="csrf_token" value="{{ csrf_token() }}"/>
            <div id="modal-id" class="modal-body">
                <div id="success-msg" class="hide">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> Check your mail for login confirmation!!
                    </div>
                </div>
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="modal-footer">

                    <div class="col-xs-10 col-sm-10 col-md-10 text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 text-left">
                        <button type="submit" class="btn btn-primary" id="submitForm">Save</button>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</div>
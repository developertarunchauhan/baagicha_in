<div>
    @if(Session::has('_store'))
    <div class="animate__animated animate__bounceInRight custom_alerts alert alert-dismissible border border-top-0 border-end-0 border-bottom-0 border-success border-5 shadow py-4 px-5 bg-light fade show" role="alert">
        {{Session::get('_store')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('_update'))
    <div class="animate__animated animate__bounceInRight custom_alerts alert alert-dismissible border border-top-0 border-end-0 border-bottom-0 border-warning border-5 shadow py-4 px-5 bg-light fade show" role="alert">
        {{Session::get('_update')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('_destroy'))
    <div class="animate__animated animate__bounceInRight custom_alerts alert alert-dismissible border border-top-0 border-end-0 border-bottom-0 border-danger border-5 shadow py-4 px-5 bg-light fade show" role="alert">
        {{Session::get('_destroy')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('_restore'))
    <div class="animate__animated animate__bounceInRight custom_alerts alert alert-dismissible border border-top-0 border-end-0 border-bottom-0 border-primary border-5 shadow py-4 px-5 bg-light fade show" role="alert">
        {{Session::get('_restore')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('_status'))
    <div class="animate__animated animate__bounceInRight custom_alerts alert alert-dismissible border border-top-0 border-end-0 border-bottom-0 border-primary border-5 shadow py-4 px-5 bg-light fade show" role="alert">
        {{Session::get('_status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('_forceDelete'))
    <div class="animate__animated animate__bounceInRight custom_alerts alert alert-dismissible border border-top-0 border-end-0 border-bottom-0 border-danger border-5 shadow py-4 px-5 bg-light fade show" role="alert">
        {{Session::get('_forceDelete')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
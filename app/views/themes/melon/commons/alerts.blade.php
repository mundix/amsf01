 @if(\Session::get('form.validation'))
     @if(\Session::get('form.validation.success'))
        <div class="alert alert-success fade in">
            <i class="icon-remove close" data-dismiss="alert"></i>
            <strong>Success!</strong>
            @foreach(\Session::get('form.validation.success') as  $key => $message)
                {{$message}}
            @endforeach
            {{ \Session::forget('form.validation.success') }}
        </div>
     @endif
     @if(\Session::get('form.validation.warning'))
        <div class="alert alert-warning fade in">
            <i class="icon-remove close" data-dismiss="alert"></i>
            <strong>Warning!</strong> Your monthly traffic is reaching limit.
        </div>
    @endif
    @if(\Session::get('form.validation.info'))
    <div class="alert alert-info fade in">
        <i class="icon-remove close" data-dismiss="alert"></i>
        <strong>Warning!</strong> Your monthly traffic is reaching limit.
    </div>
    @endif
    @if(\Session::get('form.validation.error'))
        <div class="alert alert-danger fade in">
            <i class="icon-remove close" data-dismiss="alert"></i>
            <strong>Warning!</strong>
            @foreach(\Session::get('form.validation.error')[0] as  $key => $message)
                {{$message}}
                @if($key != sizeof(\Session::get('form.validation.error')[0])-1)
                    ,
                @endif
            @endforeach
        </div>
        {{ \Session::forget('form.validation.error') }}
    @endif
@endif
@if(count($errors)> 0 )
    <div class="row">
        <div class="col-6 offset-md-3 error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class="row">
        <div class="col-6 offset-md-3 succes" >
           {{ Session::get('message') }}
        </div>
    </div>
@endif

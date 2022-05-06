@foreach(['info','success','warning','danger'] as $message_type)
    @if( session()->has($message_type) )
    <div>
        <em>"{{ session($message_type) }}"</em>
    </div>
    <br>
    @endif
@endforeach

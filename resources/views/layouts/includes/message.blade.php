@if(isset($message))
    <div class="container mb-8">
        <div class="alert alert-{{ $message->type }}" role="alert">
            <h4 class="alert-heading">{{ $message->title }}</h4>
            <p>{{ $message->primary }}</p>
            @if(!empty($message->secondary))
                <hr>
                <p class="mb-0">{{ $message->secondary }}</p>
            @endif
        </div>
    </div>
@endif
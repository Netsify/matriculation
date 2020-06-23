<div class="card mb-4 border-info">
    <div class="card-header border-info d-flex align-content-center justify-content-center">
        Комментарии
    </div>
    <div class="card-body">
        @foreach($comments as $comment)
            <div class="card mb-4 border-secondary">
                <div class="card-header border-secondary">
                    {{ $comment->user->getFullNameShort() }}
                </div>
                <div class="card-body border-info">
                    {!! $comment->body !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

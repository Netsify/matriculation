@foreach($comments as $comment)
    <div class="card-body">
        <textarea class="form-control" rows="8" name="body">{!! $comment->body !!}</textarea>
    </div>
@endforeach

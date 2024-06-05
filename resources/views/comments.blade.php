@foreach($trip->comments as $comment)
    <h5 class="card-title">{{$comment->author->username}}</h5>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{$comment->comment}}</p>
        </div>
    </div>
    <h6 class="card-subtitle mb-2 text-body-secondary">{{$comment->created_at}}</h6>
@endforeach



<form action="{{ route('addComment', ['id'=>$trip->id]) }}" method="POST">
    @csrf
    <label><h5>Leave a comment</h5></label>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
    </div>

    <div class="d-grid mx-auto mb-3">
        <button type="submit" class="btn btn-primary rounded-pill px-3">Comment</button>
    </div>
</form>


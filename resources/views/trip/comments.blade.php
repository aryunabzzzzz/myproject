<div id="commentsContainer" class="container my-5 py-5">
    <label class="mb-3"><h5>Comments</h5></label>

    <div class="row">
        <div class="col-md-12 col-lg-10">

            @foreach($trip->comments as $comment)

                <div class="d-flex flex-start">
                    <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$comment->author->username]) }}">
                        @if($comment->author->avatar_path)
                            <img class="rounded-circle shadow-1-strong me-3"
                                 {{$img = $comment->author->avatar_path}}
                                 src="{{asset("storage/$img")}}"
                                 height="50" width="50"
                            />
                        @else
                            <img class="rounded-circle shadow-1-strong me-3"
                                 src="https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png"
                                 height="50" width="50"
                            />
                        @endif
                    </a>
                    <div>
                        <a class="navbar-brand mr-auto" href="{{ route('profile', ['username'=>$comment->author->username]) }}">
                            <h6 class="fw-bold mb-1">{{$comment->author->username}}</h6>
                        </a>
                        <div class="d-flex align-items-center mb-3">
                            <p class="mb-0">{{$comment->created_at}}</p>
                        </div>
                        <p class="mb-0">{{$comment->comment}}</p>
                    </div>
                </div>
                <br>
            @endforeach

        </div>
    </div>
</div>

<div class="container my-3 py-3">
    <form id="commentForm">
        @csrf
        <label><h5>Leave a comment</h5></label>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" style="height: 100px; width: 80%"></textarea>
            <label for="floatingTextarea2">Comments</label>
            @if ($errors->has('comment'))
                <span class="text-danger">{{ $errors->first('comment') }}</span>
            @endif
        </div>

        <div id="errorMessage"></div>
        <div class="d-grid mx-auto mb-3">
            <button type="submit" class="btn btn-primary rounded-pill px-3" style="width: 200px">Comment</button>
        </div>
    </form>
</div>

<script>
    let text = $('.form-control')
    console.log(text)
    $(document).ready(function() {
        $('#commentForm').on('submit', function(event) {
            event.preventDefault();

            let commentText = $('#comment').val().trim();
            let $errorMessage = $('#errorMessage');
            let $commentsContainer = $('#commentsContainer');

            if (!commentText) {
                $errorMessage.text('Комментарий не может быть пустым.');
                return;
            }

            $.ajax({
                url: '/submit-comment',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment: commentText,
                    tripId: {{ $trip->id }}
                },
                success: function(response) {
                    $('#comment').val('');
                    let avatarPath = response.avatar ? `{{ asset('storage/${response.avatar}') }}` : 'https://miramirov.gosuslugi.ru/netcat_files/11/143/no_foto_1.png';
                    let newComment = `
                    <div class="d-flex flex-start">
                        <a class="navbar-brand mr-auto" href="">
                            <img class="rounded-circle shadow-1-strong me-3"
                                src="${avatarPath}"
                                height="50" width="50"
                            />
                        </a>
                        <div>
                            <a class="navbar-brand mr-auto" href="">
                                <h6 class="fw-bold mb-1">${response.username}</h6>
                            </a>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">${response.created_at}</p>
                            </div>
                            <p class="mb-0">${response.comment}</p>
                        </div>
                    </div>
                    <br>
                    `;
                    $commentsContainer.append(newComment);

                },
                error: function(response) {
                    $errorMessage.text('Ошибка при отправке комментария.');
                }
            });
        });
    });

</script>

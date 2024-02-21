<div class="card">
    <div class="card-body">
        @foreach($post->comment as $comment)
            <div class="d-flex flex-start align-items-center">
                <div>
                    <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
                    <p class="text-muted small mb-0">
                        Shared publicly - {{ $comment->created_at }}
                    </p>
                </div>
            </div>

            <p class="mt-3 mb-4 pb-2">
                {{ $comment->content }}
            </p>

        @endforeach
    </div>
    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
        <form method="POST" action="/comment/create">
            @csrf
            <div class="d-flex flex-start w-100">
                <div class="form-outline w-100">
                <textarea class="form-control" id="comment" name="comment" rows="4"
                          style="background: #fff;"></textarea>
                    <label class="form-label" for="comment">Message</label>
                </div>
            </div>
            <div class="float-end mt-2 pt-1">
                <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
            </div>
        </form>
    </div>
</div>







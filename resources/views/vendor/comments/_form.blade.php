<div class="lb-add-comment">
        <form method="POST" action="{{ url('comments') }}">
            @csrf
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->id }}" />
            <div class="form-group">
                <input class="form-control ttg-border-none @if($errors->has('message')) is-invalid @endif" name="message" placeholder="Add a Comment"/></input>

            </div>
            <span>Remember Community Guidelines</span>
            <button type="submit" class="pull-right btn btn-sm btn-outline-success text-uppercase">Comment</button>
        </form>

</div>
<br />

<form method="POST" action="{{ route('post.register') }}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="inputText" placeholder="title..">
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
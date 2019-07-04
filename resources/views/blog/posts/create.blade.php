<form method="POST" action="{{ route('post.register') }}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="title..">
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="5" name="content" value="{{ old('content') }}"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@extends('Layouts.app');

@section("title") New Post @endsection

@section("content")
<div class="container">
    <div class="row my-5">
        <div class="col-6">
            <h2 class="text-primary">Edit Post</h2>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route("posts") }}" class="btn btn-primary" style="width: 200px">
                <i class="bi bi-arrow-return-left"></i> Return To Post List</a>
        </div>
    </div>
    <form action="{{ route("posts.update", $post["id"]) }}" method="post">
        @method("Put")
        @csrf

        <div class="mb-3">
            <label hidden class="form-label">id</label>
            <input hidden type="text" class="form-control" value="{{ $post["id"] }}" aria-describedby="emailHelpId">
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post["title"] }}" aria-describedby="emailHelpId">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $post["description"] }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="posted_by" class="form-select" aria-label="Default select example">
                <option selected>Please Select one</option>
                @foreach($usersArray as $user)
                <option value="{{ $user["id"] }}">User: {{ $user["name"] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 150px"><i class="bi bi-plus-circle"></i> Edit</button>
    </form>
</div>

@endsection

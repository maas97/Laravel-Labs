@extends('Layouts.app');

@section('title') Blog @endsection

@section('content')
<div class="container my-5">
  <div class="row my-5">
    <div class="col-6">
      <h2 class="text-primary">Blog List</h2>
    </div>
    <div class="col-6 text-end">
      <a href="/Posts/create" class="btn btn-primary" style="width: 200px">
        <i class="bi bi-plus-circle"></i> New Post</a>
    </div>
  </div>
  <div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
          <tr>
            <th>Blog No.</th>
            <th>Title</th>
            <th>Posted By</th>
            <th>Created At</th>
            <th class="text-end px-5">Actions</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach ($postsArray as $post )
          <tr class="table-info">
            <td scope="row">{{ $post["id"] }}</td>
            <td>{{ $post["title"] }}</td>
            <td>{{ $post->user->name }}</td>

            <td>{{ \Carbon\Carbon::parse($post["created_at"])->diffForHumans() }}</td>
            <td class="text-end px-5">
              <a href="{{ route("posts.show", $post["id"]) }}" class="btn btn-info mx-3" style="width: 100px">
                <i class="bi bi-ticket-detailed"></i> Details</a>
              <a href="{{ route("posts.edit", $post["id"]) }}" class="btn btn-primary mx-3" style="width: 100px">
                <i class="bi bi-pencil-square"></i> Edit</a>
              <form id="deleteForm" class="btn btn-danger m-0 deleteForm" style="width: 100px" action="{{ route("posts.destroy", $post["id"]) }}" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="p-0 m-0 bg-danger border-0">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    {{ $postsArray->links() }}
  </div>
</div>
<script>
  let deleteForm = document.querySelectorAll(" .deleteForm");
  for (let btn in deleteForm) {
    deleteForm[btn].addEventListener("submit", () => {
      if (!window.confirm("Are You Sure You Wanna Delete This Post ?"))
        event.preventDefault();
    })
  }
</script>
@endsection
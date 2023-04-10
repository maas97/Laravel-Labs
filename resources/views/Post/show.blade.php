@extends('Layouts.app');

@section('title')
    Details
@endsection

@section('content')
    <div class="container text-primary my-5 px-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-primary">Post Details</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('posts') }}" class="btn btn-primary" style="width: 200px">
                    <i class="bi bi-arrow-return-left"></i> Back To Post List</a>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" disabled class="form-control" value="{{ $post['title'] }}" aria-describedby="emailHelpId">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" disabled class="form-control" cols="30" rows="10">{{ $post['description'] }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <input type="text" disabled class="form-control" value="{{ $post->user->name }}"
                aria-describedby="emailHelpId">
        </div>
        <div class="row my-3">
            <div class="col-12">
                @if ($comments->isNotEmpty())
                    <h3>Comments</h3>
                @else
                    <h4>Post has no comments</h4>
                @endif
                <livewire:comments :comments="$comments" :post_id="$post->id" :user_id="$post->user->id" />
            </div>
        </div>
    </div>
@endsection

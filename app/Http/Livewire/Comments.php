<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class Comments extends Component
{
    public $post_id;
    public $user_id;
    public $comments;
    public $newComment;

    public function mount($comments, $post_id, $user_id)
    {
        $this->comments = $comments;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
    }

    public function addComment()
    {
        $comment = new Comment();
        $comment->body = $this->newComment;
        $comment->user_id = $this->user_id;
        $comment->commentable_type = 'App\Models\Post';
        $comment->commentable_id = $this->post_id;

        $comment->save();

        $this->comments->push($comment);
        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.comments');
    }
}

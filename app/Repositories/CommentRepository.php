<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    /**
     * Create a new AdvertRepository instance.
     *
     * @param  App\Models\Comment $comment
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    /**
     * Create a comment.
     *
     * @param array $inputs
     * @return void
     */
    public function createComment($inputs)
    {
        $this->model->create([
            'user_id' => \Auth::id(),
            'advert_id' => $inputs['advert_id'],
            'body' => $inputs['body']
        ])->save();
    }

    public function getAdvertComments($advertId)
    {
        return $this->model->with('advert')->where('advert_id', $advertId)->get();
    }
}

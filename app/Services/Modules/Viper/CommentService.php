<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\CommentInterface;
use App\Models\Modules\Viper\Comment;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentService implements CommentInterface
{
    public function createNewComment(Collection $comment): Collection
    {
        $newComment = new Comment($comment->toArray());
        $newComment->user_id = auth()->user()->id;
        $newComment->save();
        return collect($newComment);
    }
    
    public function updateComment(Collection $comment, int $id): Collection
    {
        $commentUpdate = Comment::findOrFail($id);
        if (auth()->user()->id !== $commentUpdate->user_id) {
            throw new HttpResponseException(response()->json([
                'message' => 'No tienes permiso para actualizar este comentario.'
            ], 403));
        }

        $commentUpdate->fill($comment->toArray());
        $commentUpdate->save();
        return collect($commentUpdate);
    }

    public function getAllCommentsByProgress(int $progressId): Collection
    {
        $commentGot = Comment::with('user')
                        ->where('progress_id', $progressId)
                        ->orderBy('created_at', 'asc') 
                        ->get();
    
        $comments = $commentGot->transform(
            function (Comment $comment)
            {
                unset($comment['user_id']);
                unset($comment['user']['phone_number']);
                unset($comment['user']['address']);
                unset($comment['user']['avatar']);
                unset($comment['user']['email_verified_at']);
                unset($comment['user']['created_at']);
                unset($comment['user']['updated_at']);
                return collect($comment);
            }
        );

        return $comments;
    }

    public function getComment(int $id): Collection
    {
        $comment = Comment::with('user')->findOrFail($id);
        unset($comment['user_id']);
        unset($comment['user']['phone_number']);
        unset($comment['user']['address']);
        unset($comment['user']['avatar']);
        unset($comment['user']['email_verified_at']);
        unset($comment['user']['created_at']);
        unset($comment['user']['updated_at']);

        return collect($comment);
    }

    public function deleteComment(int $id): Collection
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return collect($comment);
    }
}
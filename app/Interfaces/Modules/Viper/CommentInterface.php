<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface CommentInterface {

    public function createNewComment(Collection $comment): Collection;
    
    public function updateComment(Collection $comment, int $id): Collection;

    public function getAllCommentsByProgress(int $progressId): Collection;

    public function getComment(int $id): Collection;

    public function deleteComment(int $id): Collection;
}

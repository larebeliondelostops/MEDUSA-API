<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\CommentRequest;
use App\Interfaces\Modules\Viper\CommentInterface;

use Illuminate\Http\Request;

class CommentController extends BaseController
{
    private CommentInterface $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function store(CommentRequest $request)
    {
        try {
            $commentCreated = $this->commentInterface->createNewComment(collect($request->validated()));

            return response()->json([
                'message' => 'Comment created successfully.',
                'data'    => $commentCreated
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(CommentRequest $request, int $id)
    {
        try {
            $commentUpdated = $this->commentInterface->updateComment(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Comment updated successfully.',
                'data'    => $commentUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $progressId)
    {
        try {
            $comments = $this->commentInterface->getAllCommentsByProgress($progressId);

            return response()->json([
                'data' => $comments,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $comment = $this->commentInterface->getComment($id);
            return response()->json([
                'data' => $comment,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $comment = $this->commentInterface->deleteComment($id);
            return response()->json([
                'message' => 'Comment deleted successfully',
                'data'=> $comment
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}

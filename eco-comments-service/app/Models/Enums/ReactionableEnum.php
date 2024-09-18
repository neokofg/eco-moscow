<?php

namespace App\Models\Enums;

enum ReactionableEnum: string
{
    case PostComment = 'post_comment';
    case VideoComment = 'video_comment';
    case PostCommentReply = 'post_comment_reply';
    case VideoCommentReply = 'video_comment_reply';
    case NoteComment = 'note_comment';
    case NoteCommentReply = 'note_comment_reply';
}

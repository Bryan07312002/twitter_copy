<?php

namespace App\Observers;

use App\Models\Like;
use App\Models\Post;

class LikeObserver
{
    /**
     * Handle the Like "created" event.
     *
     * @param  \App\Models\Like  $like
     * @return void
     */
    public function created(Like $like)
    {
        $referencePost = Post::find($like->post_id);
        $referencePost->like_number = $referencePost->like_number + 1;
        $referencePost->save();
    }

    /**
     * Handle the Like "deleted" event.
     *
     * @param  \App\Models\Like  $like
     * @return void
     */
    public function deleted(Like $like)
    {
        $referencePost = Post::find($like->post_id);
        $referencePost->like_number = $referencePost->like_number - 1;
        $referencePost->save();
    }
}

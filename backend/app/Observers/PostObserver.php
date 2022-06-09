<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        if($post->post_id){
            $referencePost = Post::find($post->post_id);
            $referencePost->comment_number = $referencePost->comment_number + 1;
            $referencePost->save();
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        if($post->post_id){
            $referencePost = Post::find($post->post_id);
            $referencePost->comment_number = $referencePost->comment_number - 1;
            $referencePost->save();
        }
    }
}

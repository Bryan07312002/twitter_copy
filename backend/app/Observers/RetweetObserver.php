<?php

namespace App\Observers;

use App\Models\Retweet;
use App\Models\Post;

class RetweetObserver
{
    public function created(Retweet $retweet)
    {
        $referencePost = Post::find($retweet->post_id);
        $referencePost->retweet_number = $referencePost->retweet_number + 1;
        $referencePost->save();
    }

    public function deleted(Retweet $retweet)
    {
        $referencePost = Post::find($retweet->post_id);
        $referencePost->retweet_number = $referencePost->retweet_number - 1;
        $referencePost->save();
    }
}

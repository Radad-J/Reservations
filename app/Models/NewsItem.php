<?php
// app/NewsItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class NewsItem extends Show implements Feedable
{
    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary(substr($this->description, 0, 30))
            ->updated($this->updated_at ?? $this->created_at)
            ->link(env('APP_URL')."/show/{$this->id}")
            ->author(env('APP_CONTACT'));
            //->authorName(env('APP_NAME'));
            //->authorEmail("info@".env('APP_NAME')."com");
    }

    public static function getFeedItems()
    {
        return NewsItem::orderByDesc('created_at')->take(5)->get();
    }

}

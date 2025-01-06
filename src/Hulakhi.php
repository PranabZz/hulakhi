<?php

namespace Hulakhi;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Hulakhi\Mail\NotificationMail;
use Hulakhi\Models\Subscriber;

class Hulakhi
{
    public function notifySubscribers(string $title, string $metaImage, string $description, string $link)
    {
        $batchSize = 100;
        $lastProcessedId = Cache::get('hulakhi_last_processed_id', 0);

        $subscribers = Subscriber::where('id', '>', $lastProcessedId)
            ->orderBy('id', 'asc')
            ->take($batchSize)
            ->get();

        if ($subscribers->isEmpty()) {
            Cache::forget('hulakhi_last_processed_id');
            return;
        }

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NotificationMail($title, $metaImage, $description, $link));
            $lastProcessedId = $subscriber->id;
        }

        Cache::put('hulakhi_last_processed_id', $lastProcessedId);

        if (Subscriber::where('id', '>', $lastProcessedId)->exists()) {
            $this->notifySubscribers($title, $metaImage, $description, $link);
        } else {
            Cache::forget('hulakhi_last_processed_id');
        }
    }
}

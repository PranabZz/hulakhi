<?php

namespace Hulakhi\Mail;

use Illuminate\Mail\Mailable;

class NotificationMail extends Mailable
{
    public $title;
    public $metaImage;
    public $description;
    public $link;

    public function __construct($title, $metaImage, $description, $link)
    {
        $this->title = $title;
        $this->metaImage = $metaImage;
        $this->description = $description;
        $this->link = $link;
    }

    public function build()
    {
        return $this->view('hulakhi::email')
            ->subject($this->title)
            ->with([
                'title' => $this->title,
                'metaImage' => $this->metaImage,
                'description' => $this->description,
                'link' => $this->link,
            ]);
    }
}

<?php

namespace App\Dto\V1\Note;

use App\Contracts\DtoContracts\V1\Note\NoteStoreDtoContract;

final readonly class NoteStoreDto extends NoteStoreDtoContract
{
    /**
     * @param string $title
     * @param string $image_url
     * @param string $category_id
     * @param string $content
     */
    public function __construct(
        public string $title,
        public string $image_url,
        public string $category_id,
        public string $content
    )
    {
        parent::__construct();
    }
}

<?php

namespace App\Dto\V1\Reactions;

use App\Contracts\DtoContracts\V1\Reactions\ReactionStoreDtoContract;
use App\Models\Enums\ReactionableEnum;
use App\Models\Enums\ReactionTypeEnum;

final readonly class ReactionStoreDto extends ReactionStoreDtoContract
{
    /**
     * @param ReactionableEnum $type
     * @param ReactionTypeEnum $reactionType
     * @param string $id
     */
    public function __construct(
        public ReactionableEnum $type,
        public ReactionTypeEnum $reactionType,
        public string $id,
    )
    {
        parent::__construct();
    }
}

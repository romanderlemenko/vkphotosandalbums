<?php

namespace VkPhotosAndAlbums\Models;

use VkPhotosAndAlbums\Models\Base\Albums as BaseAlbums;

/**
 * Skeleton subclass for representing a row from the 'albums' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Albums extends BaseAlbums
{
    public static function create(array $album): void
    {
        (new self())
            ->setId($album['id'])
            ->setOwnerId($album['owner_id'])
            ->setTitle($album['title'])
            ->setDescription($album['description'])
            ->setCreated($album['created'])
            ->setUpdated($album['updated'])
            ->setSize($album['size'])
            ->save();
    }
}

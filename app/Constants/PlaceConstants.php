<?php

namespace App\Constants;

use Faker\Core\Coordinates;

class PlaceConstants
{
    // COMMON
    public const SLUG = 'slug';
    public const CATEGORY_ID = 'categoryId';
    public const COORDINATE = 'll';
    public const CATEGORIES = 'categories';
    public const LIMIT = 'limit';
    public const FSQ_ID = 'fsq_id';
    public const NAME = 'name';
    public const LOCATION = 'location';
    public const LINK = 'link';
    public const PHOTO = 'photo';
    public const PREFIX = 'prefix';
    public const SUFFIX = 'suffix';

    // API 
    public const API_URL = 'https://api.foursquare.com/v3/places';
    public const PLACE_SEARCH = '/search';
    public const PLACE_PHOTOS = '/photos';

    // COORDINATES - LAT & LON
    public const COORDINATES = [
        'tokyo'    => '35.652832,139.839478',
        'osaka'    => '34.6937,135.5023',
        'kyoto'    => '35.0116,135.7681',
        'nagoya'   => '35.1815,136.9066',
        'sapporo'  => '43.0618,141.3545',
        'yokohama' => '35.4437,139.6380'
    ];
}
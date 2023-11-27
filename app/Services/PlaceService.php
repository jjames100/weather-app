<?php

namespace App\Services;

use App\Constants\PlaceConstants;
use App\Interfaces\FetchDataInterface;
use App\Library\RequestLibrary;
use Illuminate\Support\Arr;

class PlaceService implements FetchDataInterface
{
    public function getData($params)
    {
        $slug = Arr::get($params, PlaceConstants::SLUG);

        $data = [
            PlaceConstants::COORDINATE => PlaceConstants::COORDINATES[$slug],
            PlaceConstants::CATEGORIES => Arr::get($params, PlaceConstants::CATEGORY_ID),
            PlaceConstants::LIMIT      => 8
        ];

        $response = RequestLibrary::request('get', PlaceConstants::API_URL . PlaceConstants::PLACE_SEARCH, $data, true);
        $newResponse = $this->filterPlacesResponse($response);
        $newResponse = $this->getPhotos($newResponse);

        return $newResponse;
    }

    public function getPhotos($places)
    {
        $data = [
            PlaceConstants::LIMIT => 1
        ];

        foreach ($places as $key => $place) {
            $response = RequestLibrary::request('get', PlaceConstants::API_URL . '/' . $place[PlaceConstants::FSQ_ID] . PlaceConstants::PLACE_PHOTOS, $data, true);
            $response = Arr::get($response, 'data');

            if (count($response) > 0) {
                $photo = Arr::only($response[0], [PlaceConstants::PREFIX, PlaceConstants::SUFFIX]);
            } else {
                $photo = [];
            }

            $places[$key][PlaceConstants::PHOTO] = $photo;
        }

        return $places;
    }

    private function filterPlacesResponse($response)
    {
        $filteredResponse = Arr::get($response, 'data.results');
        $newResponse = [];
        
        foreach ($filteredResponse as $result) {
            $newResponse[] = Arr::only($result, [PlaceConstants::FSQ_ID, PlaceConstants::NAME, PlaceConstants::LOCATION, PlaceConstants::LINK]);
        }

        return $newResponse;
    }
}
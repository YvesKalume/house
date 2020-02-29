latitude = {{$house->lat}};
longitude = {{$house->long}};
@map([
    'lat' => latitude ,
    'lng' =>longitude,
    'zoom' => 16,
    'markers' => [
            [
                'title' => 'Go NoWare',
                'lat' =>lat,
                'lng' =>lng,
            ],
    ],
])

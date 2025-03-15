<?php

namespace Kaipfeiffer\Tramp\Controllers;

use Kaipfeiffer\Tramp\Helpers\CurlHelper;

class LocationController
{
    /**
     * create
     * 
     * @param   array
     * @since   1.0.1 
     */
    public static function create($data)
    {

        $data   += static::get_geo_data($data);
        return $data;
    }
    /**
     * get_geo_data
     * 
     * @param   array
     * @return  array|null
     * @throws  Exception
     * @since   1.0.1 
     */
    protected static function get_geo_data($data) 
    {
        $result = null;
        preg_match('/^(.*)(\d\w*)$/', $data['street'], $matches);
        list($res, $street_name, $street_number) = $matches;

        $openstreetmap  = new CurlHelper('https://nominatim.openstreetmap.org/search');
        $result         = $openstreetmap->get(array(
            'postalcode'    => $data['zipcode'],
            'city'          => $data['city'],
            'street'        => $street_number . ' ' . $street_name,
            'format'        => $data['format'],
            'country'       => $data['country'] ?? 'germany',
            // 'email'         => 'tramp-lib@loworx.com',
        ), true);

        if ($result['err']) {
            error_log(__CLASS__ . '->' . __LINE__ . '->' . print_r($result['err'], 1));
            throw new \Exception($result['err']);
        }
        error_log(__CLASS__ . '->' . __LINE__ . '->' . is_array($result['response']) . '&&' . \array_is_list($result['response']) . '->' . print_r($result, 1));

        if (is_array($result['response']) && \array_is_list($result['response'])) {
            $geodata            = reset($result['response']);
            $result = array(
                'latitude'   => $geodata['lat'],
                'longitude'  => $geodata['lon'],
            );
        }

        return $result;
    }
}

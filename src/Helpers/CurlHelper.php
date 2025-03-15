<?php

namespace Kaipfeiffer\Tramp\Helpers;

class CurlHelper
{
    /**
     * api url
     * 
     * @var     string
     * @since   1.0.1
     */
    protected $api_url;


    /**
     * handle for curl
     * 
     * @var     \CurlHandle
     * @since   1.0.1
     */
    protected $curl;


    /**
     * handle for curl
     * 
     * @var     array
     * @since   1.0.1
     */
    protected $curl_options;


    /**
     * user agent for requests
     * 
     * @var     string
     * @since   1.0.1
     */
    protected $curl_user_agent;


    /**
     * constructor
     * 
     * @param   string
     * @since   1.0.1
     */
    public function __construct($api)
    {
        $this->api_url = $api;

        $this->curl = curl_init();

        $this->curl_user_agent  = 'tramp-lib';

        $this->curl_options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_USERAGENT => $this->curl_user_agent,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            )
        );
    }


    /**
     * destructor
     * 
     * @param   string
     * @since   1.0.1
     */
    public function __destruct()
    {
        curl_close($this->curl);
    }


    /**
     * get
     * 
     * @param   array
     * @since   1.0.1
     */
    public function get($params, $json = false)
    {
        $result     = array();
        $api_url    = $this->api_url . '?' . http_build_query($params);

        error_log(__CLASS__ . '->' . __LINE__ . '->' . $api_url);

        $parameter  =
            $this->curl_options +
            array(
                CURLOPT_URL => $api_url,
                CURLOPT_CUSTOMREQUEST => "GET",
            );

        curl_setopt_array(
            $this->curl,
            $parameter,
        );

        $result['parameter']  = $parameter;
        $result['response']   = curl_exec($this->curl);
        $result['err']        = curl_error($this->curl);

        if ($json) {
            $result['response'] = json_decode($result['response'],true);
        }

        return $result;
    }
}

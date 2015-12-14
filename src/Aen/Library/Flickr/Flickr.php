<?php

namespace Aen\Library\Flickr;

class Flickr {

    private $apiKey;

    public function __construct($apikey = null) {

        $this->apiKey = $apikey;

    }



    public function search($query = null, $user_id = null, $per_page = 28, $format = 'php_serial') {

        $args = array(

            'method' => 'flickr.photos.search',

            'api_key' => $this->apiKey,

            'text' => urlencode($query),

            'user_id' => $user_id,

            'per_page' => $per_page,

            'format' => $format,

            'nojsoncallback' => 1

        );

        $url = 'https://www.flickr.com/services/rest/?';

        $search = $url.http_build_query($args);
        $result = $this->file_get_contents_curl($search);
        //$result = file_get_contents($search);
        if ($format == 'php_serial') $result = unserialize($result);
        return $result;

    }



    private function file_get_contents_curl($url) {

        $proxy = "http://proxy.unicaen.fr:3128";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_PROXY, $proxy);

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_TIMEOUT, 5);

        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.13) Gecko/20101203 AlexaToolbar/alxf-1.54 Firefox/3.6.13 GTB7.1");

        $data = curl_exec($curl);

        return $data;

    }

}

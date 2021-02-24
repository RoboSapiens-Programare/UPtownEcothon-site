<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/config/curl_auth.php";

class CurlPost
{
    private $url;
    private $options;
           
    /**
     * @param string $url     Request URL
     * @param array  $options cURL options
     */
    public function __construct($url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    /**
     * Get the response
     * @return string
     * @throws \RuntimeException On cURL error
     */
    public function __invoke(array $post)
    {
        $ch = curl_init($this->url);
        
        foreach ($this->options as $key => $val) {
            curl_setopt($ch, $key, $val);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        $errno    = curl_errno($ch);
        
        if (is_resource($ch)) {
            curl_close($ch);
        }

        if (0 !== $errno) {
            throw new RuntimeException($error, $errno);
        }
        
        return $response;
    }
}

function send_file_for_scan($filepath){
    //Send the file to be scanned
    //Auth headers
    $apikey = $GLOBALS['apikey'];
    $headers = array(
        "apikey: $apikey",
        "content-type: application/octet-stream"
    );
    $curl = new CurlPost("https://api.metadefender.com/v4/file", [
        CURLOPT_HTTPHEADER => $headers
    ]);
    try {
        // execute the request
        $response = $curl(["@".$filepath]);
    } catch (\RuntimeException $ex) {
        // catch errors
        die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
    }

    return $response;
}

function get_scan_results($data_id){
    //Get file results
    //Auth headers
    $apikey = $GLOBALS['apikey'];
    $headers = array(
        "apikey: $apikey"
    );
    $curl = new CurlPost("https://api.metadefender.com/v4/file/" . $data_id, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_CUSTOMREQUEST => "GET"
    ]);
    try {
        // execute the request
        $response = $curl([]);
    } catch (\RuntimeException $ex) {
        // catch errors
        die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
    }

    return $response;
}

?>
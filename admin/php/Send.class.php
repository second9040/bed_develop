<?php
    class Send
    {
        public $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
        public $reponse = '';
        public $reponse_headers = '';
        public function prepare_headers($headers)
        {
            return
            implode('', array_map(function($key, $value) {
                    return "$key: $value\r\n";
                }, array_keys($headers), array_values($headers))
            );
        }

        public function setHeaders($headers = [])
        {
            $this->headers = $headers;
        }

        public function post($url, $data = [], $ignore_errors = false)
        {
            $this->response = '';
            $this->response_headers = '';
            $data_query = http_build_query($data);
            $data_len   = strlen($data_query);
            $this->headers['Content-Length'] = $data_len;
            $response = file_get_contents($url, false, stream_context_create([
                                                                                'http' => [
                                                                                                'method'        => 'POST',
                                                                                                'header'        => $this->prepare_headers($this->headers),
                                                                                                'content'       => $data_query,
                                                                                                'ignore_errors' => $ignore_errors
                                                                                            ]
                                                                            ]));
            $this->response = $response;
            $this->response_headers = $http_response_header;
            // return ($response === false) ? false : ['headers' => $http_response_header, 'body' => $response];
        }

        public function get($url, $data = [], $ignore_errors = false)
        {
            $this->response = '';
            $this->response_headers = '';
            $data_query = http_build_query($data);
            $data_len   = strlen($data_query);
            $this->headers['Content-Length'] = $data_len;
            $response = file_get_contents($url, false, stream_context_create([
                                                                                'http' => [
                                                                                                'method'        => 'GET',
                                                                                                'header'        => $this->prepare_headers($this->headers),
                                                                                                'content'       => $data_query,
                                                                                                'ignore_errors' => $ignore_errors
                                                                                            ]
                                                                            ]));
            $this->response = $response;
            $this->response_headers = $http_response_header;
        }

        public function json($url, $data = [], $ignore_errors = false)
        {
            $this->response = '';
            $this->response_headers = '';
            $data_query = json_encode($data);
            $response = file_get_contents($url, false, stream_context_create([
                                                                                'http' => [
                                                                                                'method'        => 'POST',
                                                                                                'header'        => $this->prepare_headers($this->headers),
                                                                                                'content'       => $data_query,
                                                                                                'ignore_errors' => $ignore_errors
                                                                                            ]
                                                                            ]));
            $this->response = $response;
            $this->response_headers = $http_response_header;
        }
    }

?>
<?php
namespace App\Http;

class Response {
    public function render() {
        foreach ($this->headers as $headerKey => $headerVal) {
            header($headerKey.': '.$headerVal);
        }
        
    }
}
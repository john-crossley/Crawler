<?php namespace Bot\Adapters;

class Json implements Adaptable
{
    /**
     * @param $data
     * @return mixed
     * @internal param $response
     */
    public function parse($data)
    {
        return json_decode($data);
    }
}
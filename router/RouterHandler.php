<?php

namespace Router;

class RouterHandler {

    protected $method;
    protected $data;

    public function set_method($method) {
        $this->method = $method;
    }

    public function set_data($data) {
        $this->data = $data;
    }

    public function route($controller, $id) {

        $resource = new $controller();

        switch($this->method) {
            case "get":
                if ($id)
                    $resource->show($id);
                else
                    $resource->index();
                break;
            case "control":
                $resource->control();
                break;
            default:
                $resource->index();
                break;
        }
    }    
}
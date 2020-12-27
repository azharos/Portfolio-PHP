<?php

class Controller
{
    public function view($views, $data = [])
    {
        require_once "app/view/" . $views . ".php";
    }

    public function model($models)
    {
        require_once "app/model/" . $models . ".php";
        return new $models;
    }

    public function library($library)
    {
        require_once "app/libraries/" . $library . ".php";
    }
}

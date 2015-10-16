<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.2015
 * Time: 6:09
 */
interface TableBuilder
{
    public function setTitle($title);

    public function setFormat($format);

    public function build();
}
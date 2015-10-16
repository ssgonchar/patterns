<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.2015
 * Time: 6:08
 */
abstract class Report implements TableBuilder
{
    private $title;

    private $format;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    abstract protected function getData();

    /**
     *
     */
    public function build()
    {
        $report = array(
            'file' => $this->title.'.'.$this->format,
            'data'=>$this->getData(),
        );

        echo 'Build report in file '.$report['file']."\n";

        foreach ($report['data'] as $key => $row) {
            echo $key.'. '.$row."\n";
        }

    }


}
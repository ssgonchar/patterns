<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.2015
 * Time: 6:10
 */
class DailyOrders extends Report
{
    /**
     * @return array
     */
    protected function getData()
    {
        return array(
            'lada kalina 1956',
            'dewoo nexia 2011',
            'tayota korola 2010',
            'chevrolette lacetti 2007',
        );
    }
}
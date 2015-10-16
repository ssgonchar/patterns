<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.2015
 * Time: 6:09
 */
class MonthlyOrders extends Report
{
    /**
     * @return array
     */
    protected function getData()
    {
        return array(
            'reno laguna 2014',
            'mercedez benz S 2015',
            'lamborgini diablo 2010',
        );
    }

}
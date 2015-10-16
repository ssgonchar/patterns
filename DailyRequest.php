<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.2015
 * Time: 6:10
 */
class DailyRequest extends Report
{
    /**
     * @return array
     */
    protected function getData()
    {
        return array(
            'How match price on new beauty car?',
            'What do you think about stupid designers?',
            'Where i can find yesterday day?',
        );
    }
}
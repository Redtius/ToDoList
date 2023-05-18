<?php

namespace database\factories\FactoryHelpers;


class FactoryHelper
{

     public static function GetRandomId($models){
        //eloquent ORM to get the count of the models table (how many elements init)
        $count = $models::query()->count();

        if($count === 0)
        {
            //if the model has no elements init then create an element and return its id
            return $models::factory(1)->create()->id();
        }
        //else return a random id
        return rand(1,$count);
    }

}

<?php

namespace database\seeders\Traits;
use Illuminate\Support\Facades\DB;


trait TruncateTable
{
    protected function truncate($table){
        DB::table($table)->truncate();
}
}

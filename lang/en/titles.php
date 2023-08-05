<?php

    use Illuminate\Support\Facades\DB;

    $result = DB::table('words')->pluck('en', 'word')->toArray();

    return $result;




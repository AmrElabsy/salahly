<?php

    use Illuminate\Support\Facades\DB;

    $result = DB::table('words')->pluck('ar', 'word')->toArray();

    return $result;


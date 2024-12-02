<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

DB::table('prices')->insert([
    [
        'price' => '70000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '08:00',
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '17:00',
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '08:00',
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '90000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '17:00',
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '60000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '08:00',
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '70000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '17:00',
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '75000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '08:00',
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '85000',
        'day' => 'Monday, Tuesday, Wednesday, Thursday',
        'after' => '17:00',
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '08:00',
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '100000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '17:00',
        'generation' => 'hssv',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '90000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '08:00',
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '120000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '17:00',
        'generation' => 'nl',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '70000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '08:00',
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '80000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '17:00',
        'generation' => 'nctte',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '85000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '08:00',
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ], [
        'price' => '90000',
        'day' => 'Friday, Saturday, Sunday',
        'after' => '17:00',
        'generation' => 'vtt',
        'created_at' => Carbon::today(),
        'updated_at' => Carbon::today(),
    ]
]);

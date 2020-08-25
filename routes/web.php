<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|@foreach($array_data as $key=>$value)
                    @if($value["state"] <= 50)
                    <tr class="table-danger">
                    @elseif($value["state"] <= 75)
                    <tr class="table-warning">
                    @elseif($value["state"] <= 100)
                    <tr class="table-success">
                    @endif
                        <td>{{$value["device"]}}</td>
                        <td>{{$value["description"]}}</td>
                        <td>{{$value["state"]}}%</td>
                    </tr>
                @endforeach()
*/

Route::get('/', 'PagesController@index');
Route::post('use', 'PagesController@index');
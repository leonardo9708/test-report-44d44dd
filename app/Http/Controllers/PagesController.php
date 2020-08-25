<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function index(Request $request){
        $date1 = $request->date1;
        $date2 = $request->date2;
        $response_master = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot_use_graphics?id=5');
        $response_service = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot_use_graphics/iot-use-graphics-service?id=5');
        $response_visitf = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot_use_graphics/iot-use-graphics-visitf?id=5');
        $response = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot-web-report?rid=5&minute=30');
        $response3 = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot-web-report?rid=5&minute=4320');
        $response30 = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot-web-report?rid=5&minute=43200');
        if ($date1 != "" || $date2 != ""){
            $response_use = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot_use_graphics/iot-use-graphics-use?date_start='.$date1.'&date_finish='.$date2.'&residential_id=5');
            echo($response_use);
            $array_data_use = json_decode($response_use, true);
        } else {
            $response_use = file_get_contents('https://2atle79tca.execute-api.us-east-1.amazonaws.com/dev/iot_use_graphics/iot-use-graphics-use?date_start=0&date_finish=0&residential_id=0');
            echo($response_use);
            $array_data_use = json_decode($response_use, true);
        }
        $array_data = json_decode($response, true);
        $array_data3 = json_decode($response3, true);
        $array_data30 = json_decode($response30, true);
        $array_data_master = json_decode($response_master, true);
        $array_data_service = json_decode($response_service, true);
        $array_data_visitf = json_decode($response_visitf, true);
        return view('welcome', ["array_data"=>$array_data, "array_data3"=>$array_data3, "array_data30"=>$array_data30, "array_data_master"=>$array_data_master, "array_data_service"=>$array_data_service, "array_data_visitf"=>$array_data_visitf, "array_data_use"=>$array_data_use, "date1"=>$date1, "date2"=>$date2]);
    }
}

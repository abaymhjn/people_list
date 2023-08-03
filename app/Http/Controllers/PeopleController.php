<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    //
    public $data;
    public function __construct()
    {
        $data = file_get_contents('json/data.json');
        $this->data = json_decode($data);
    }
    public function holiday($id) {
        if($this->data[$id]) {
            $data = $this->data[$id];
            $index = $id+1;
            $next_index =  $id+1;
            $prev_index = $id-1;
            $html = '<li>
                        <div class="list-left">'.$index.'</div>
                        <div class="list-right">
                            <div class="name">Name: '.$data->name.'</div>
                            <div class="location">Location: '.$data->location.'</div>
                        </div>
                    </li>';
        } else {
            $index = $id+1;
            $next_index = 0;
            $prev_index = $id-1;
            $html = '<li>
                        <div class="list-left"></div>
                        <div class="list-right">
                            <div class="name">No more people!</div>
                        </div>
                    </li>';
        }
        echo json_encode(array('status'=>true,'html'=>$html,'prev_index'=>$prev_index,'next_index'=>$next_index));
    }
}

<?php

namespace ILabAfrica\SpecimenTracker\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SpecimenTracker extends Controller
{
    //
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function identifier()
    {
        // $count = Specimen::whereRaw('')count() + 1;
        $count =  DB::select("SELECT COUNT(*) FROM specimens WHERE MONTH(  `created_at` ) =".date('m')." AND YEAR(`created_at`)=".date('Y')) + 1;
        $tracker =date('Y_m_d');

        $data = 'ILAB_'.$count. '_'.$tracker;

        return $data;

    }
}

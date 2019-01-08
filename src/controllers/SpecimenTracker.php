<?php

namespace ILabAfrica\SpecimenTracker\Controllers;

use Illuminate\Http\Request;
use App\Models\Specimen;
use App\Http\Controllers\Controller;
use ILabAfrica\SpecimenTracker\SpecimenIdentifierPDF;
use DB;

class SpecimenTracker extends Controller
{
    //
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function identifier()
    {
        $where ="MONTH(`created_at`) =".date('m')." AND YEAR(`created_at`)=".date('Y');
        $count =  DB::table('specimens')->whereRaw($where)->count();
        $count+=1;

        $tracker =date('Y_m_d');

        $data = 'ILAB_'.$count. '_'.$tracker;

        return $data;

    }

    public function print($id)
    {
        $specimen = Specimen::whereId($id)->first();
        $identifier = $specimen->identifier;

        $pdf = new SpecimenIdentifierPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //use a custom view to make the html content to be used in generation of the pdf
        //this approach allows for more html like styling though limited
        $view = view('specimentracker::pdf', compact('identifier'));
        $html_content = $view->render();
        $pdf->AddPage();
        $pdf->writeHTML($html_content, true, false, true, false, '');

        return $pdf->Output('example_001.pdf', 'I');
    }
}

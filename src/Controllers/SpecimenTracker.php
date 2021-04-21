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
        $count +=1;

        $tracker =date('Y_m_d');

        $data = 'ILAB_'.$count. '_'.$tracker;

        return $data;

    }

    public function print($id)
    {
        $specimen = Specimen::whereId($id)->first();
        $identifier = $specimen->identifier;

        $custom_layout = array(70, 70);
        $pdf = new SpecimenIdentifierPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set style for qr code
        $style = array(
            'border' => 2,
            'padding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false
        );

        // QRCODE,H : QR-CODE Best error correction
        $pdf->write2DBarcode($identifier, 'QRCODE,H', 5, 50, 50, 50, $style, 'N');
        //use a custom view to make the html content to be used in generation of the pdf
        //this approach allows for more html like styling though limited
        
        //print Text
        // $pdf->AddPage();
        /*$view = view('specimentracker::pdf', compact('identifier'));
        $html_content = $view->render();
        
        $pdf->writeHTML($html_content, true, false, true, false, '');*/

        return $pdf->Output('example_001.pdf', 'I');
    }
}

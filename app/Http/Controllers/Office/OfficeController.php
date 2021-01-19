<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\MailRequest;
use App\Mail\OfficeSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OfficeController extends Controller
{
    /**
     * @param Request $request
     */
    public function send(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        Mail::to('artemkyrut@gmail.com')->send(new OfficeSend($name,$phone));
        return response()->json([
            'status' => 200,
            'message' => 'Спасибо за обращение. Ваша заявка принята, в ближайщее время наш специалист свяжется с вами.'
        ]);
    }
}

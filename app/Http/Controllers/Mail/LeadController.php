<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $formData = $request->all();

        $validator = $this->validation($formData);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Alcuni campi non sono stati compilati correttamente, riprova.',
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($formData);
        $newLead->save();

        Mail::to('christian.arca.mail@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
            'message' => 'Email inviata correttamente',
        ]);
    }

    private function validation($formData)
    {
        $validator = Validator::make(
            $formData,
            [
                'name' => 'required|max:100',
                'email' => 'required|max:100',
                'content' => 'required'
            ],
            []
        );

        return $validator;
    }
}

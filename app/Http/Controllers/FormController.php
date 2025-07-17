<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getForm(Request $request)
    {
        $form =
            [
                'id' => 'form-1',
                'elements' =>
                [
                    [
                        'id' => 'question-1',
                        'type' => 'multipleChoice',
                        'config' =>
                        [
                            'question' => 'What is this question?',
                            'options'  => [
                                "a" => "Paris",
                                "b" => "London",
                                "c" => "Berlin"
                            ]
                        ],
                    ],
                    [
                        'id' => 'question-2',
                        'type' => 'starRating',
                        'config' =>
                        [
                            "start-value" => "低い",
                            "max" => 5,
                            "value" => 3,
                            "end-value" => "高い",
                        ],
                    ],
                ]
            ];
        return view('form.form-page', compact('form'));
    }
}

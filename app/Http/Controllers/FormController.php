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
                            'type'=>'radio',
                            'question' => '選択肢見出し（任意）',
                            'options'  => [
                                "a" => "選択肢1",
                                "b" => "選択肢2",
                                "c" => "選択肢3"
                            ]
                        ],
                    ],
                    [
                        'id' => 'question-2',
                        'type' => 'multipleChoice',
                        'config' =>
                        [
                            'type'=>'radio',
                            'question' => '選択肢見出し（任意）',
                            'options'  => [
                                "a" => "選択肢3",
                            ]
                        ],
                    ],
                    [
                        'id' => 'question-3',
                        'type' => 'multipleChoice',
                        'config' =>
                        [
                            'type'=>'checkbox',
                            'question' => '選択肢見出し（任意）',
                            'options'  => [
                                "a" => "選択肢3",
                                "b" => "sen"
                            ]
                        ],
                    ],
                    [
                        'id' => 'question-4',
                        'type' => 'rating',
                        'config' =>
                        [
                            "type"=>"starRating",
                            "start-value" => "低い",
                            "max" => 5,
                            "value" => 3,
                            "end-value" => "高い",
                        ],
                    ],
                    [
                        'id' => 'question-5',
                        'type' => 'rating',
                        'config' =>
                        [
                            "type"=>"circleRating",
                            "start-value" => "低い",
                            "max" => 5,
                            "value" => 3,
                            "end-value" => "高い",
                        ],
                    ],
                    [
        'id' => 'matrix-question-6',
        'type' => 'table',
        'config' => [
            'type' => 'matrixCheckbox',
            'rows' => [
                ['label' => '行1', 'values' => [0, 1, 0]],
                ['label' => '行2', 'values' => [1, 0, 1]],
            ],
            'columns' => ['列1', '列2', '列3']
        ],
    ],
    [
        'id' => 'matrix-question-7',
        'type' => 'table',
        'config' => [
            'type' => 'matrixTextInput',
            'rows' => [
                ['label' => '行A', 'values' => [3, 2, 1]],
                ['label' => '行B', 'values' => [0, 0, 5]],
            ],
            'columns' => ['項目A', '項目B', '項目C']
        ],
    ],
                ]
            ];
        return view('form.form-page', compact('form'));
    }
}

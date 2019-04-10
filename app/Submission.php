<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class Submission extends Model
{
    protected $guarded = [];
    const Questions = [
        [
            'index' => 1,
            'question' => 'What is the problem your business intend to solve',
            'chars' => 50
        ],
        [
            'index' => 2,
            'question' => 'Detailed Description of your business idea', #
            'chars' => 300

        ],
        [
            'index' => 3,
            'question' =>  'Addressable Market',
            'chars' => 50
        ],
        [
            'index' => 4,
            'question' => 'What is your revenue model?',
            'chars' => 150
        ],
        [
            'index' => 5,
            'question' =>  'What is your Marketing Strategies?',
            'chars' => 100
        ], [
            'index' => 6,
            'question' => 'Who are your Competitors?',
            'chars' => 50
        ], [
            'index' => 7,
            'question' => 'What differentiates your business or product from that of your competitors?',
            'chars' => 100
        ],
        [
            'index' => 8,
            'question' => 'What impact will your business create on short and long term?',
            'chars' => 50

        ], [
            'index' => 9,
            'question' => 'What are the possible challenges your business will face? ',
            'chars' => 50
        ], [
            'index' => 10,
            'question' => 'How will you solve these challenges? ',
            'chars' => 100
        ],
        [
            'index' => 11,
            'question' => 'Elevator Pitch on your business idea.',
            'chars' => 20
        ],
        [
            'index' => 12,
            'question' => 'Wow Us; tell us something exciting about your business idea and yourself.',
            'chars' => 50,
        ],
        [
            'index' => 13,
            'question' => 'Breakdown of your Budget',
            'chars' => 200
        ],
        [
            'index' => 14,
            'question' => 'Aims & Objective of your business',
            'chars' => 50
        ],
        [
            'index' => 15,
            'question' => 'Tell us about yourself',
            'chars' => 100
        ]
    ];

    public static function newFromRequest($data)
    {
        try {
            return static::firstOrCreate($data);
        } catch (Exception $e) {
            return back()->withInput();
        }
    }
}

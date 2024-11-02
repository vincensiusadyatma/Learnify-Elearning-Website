<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
                    [
                        'title'=> 'Java',
                        'description'=>'Understand the language behind millions of apps. Grasp core concepts, write basic programs, and make your first step forward breaking into tech.'
                    ],
                    [
                        'title'=>'Python',
                        'description'=>'Python is a straightforward and versatile language, making it ideal for beginners and experts alike. Dive into our curated lessons to gain foundational skills or branch out into specialized fields, from web development to data analysis.'
                    ],
                    [
                        'title'=>'HTML',
                        'description'=>'Fundamental part of every web developers toolkit. HTML provides the content that gives web pages structure, by using elements and tags, you can add text, images, videos, forms, and more.'
                    ],
                    [
                        'title'=>'JavaScript',
                        'description'=>"JavaScript is a powerfull dynamic behavior on websites and plays an important role in many fields, like front- and back-end engineering, game and mobile development, virtual reality, and more. In this course, you'll learn javaScript fundamentals that will be helpful as you dive deeper into more advanced topics."
                    ],
                    [
                        'title'=>'CSS',
                        'description'=>'CSS, shortfor Cascading Style Sheets, is a style sheet language used to style websites. Colors, fonts, and page layouts for a site can all be managed using CSS. The more comfortable you are with CSS, the better equipped you will be to create an appeling website.'
                    ]
                ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            [
                'title'=>'Introduction to Java',
                'content'=>"Ever wondered why Java's logo is a steaming cup of coffee? The creators of Java, while brainstorming a name for their new language, chose 'Java', a slang term for 'coffee'. Just as coffee fuels our day, Java powers the tech world with its robust and versatile features.
                In this topic, we will explore why java has been a popular choice among developers for over two decades and how it has brewed success in various domains. We will also introduce you to your very first Java program. So, grab your cup of coffee and join us on this exciting journey into the world of java!.
                Java is a high-level, class-based, object-oriented programming language. James Gosling at Sun Microsystems designed it, it was released in 1995. The language was developed with the 'Write Once, Run Anywhere' (WORA) philosophy. This principle underscore Java's key feature - platform independence, allowing the same Java program to run on multiple platforms without modifications.",
                'course_id'=>1
            ],
            [
                'title'=>'Data types and variables',
                'content'=>"In programming, <strong>variable</strong> is a placeholder for storing a value of a particular <strong>type:</strong> a string, a number, or something else. In this topic, you will learn how to <strong>declare</strong> and use variables in Java programs.
                Every variable has a name (also known as <strong>an identifier</strong>)",
                'course_id'=>1
            ],
            [
                'title'=>'Introduction to Python',
                'content'=>"Pyhon, developed by Guido Van Rossum in 1991, is loved by beginners and experts alike for its readable code and concise syntax. This language is so versatile that it can power websites, analyze data, build machine learning models, automate tasks, create games, and even control robots!
                Writing code in Python is as easy as pie. So let's ge coding without any delay!",
                'course_id'=>2
            ],
            [
                'title'=>'Introduction to HTML',
                'content'=>"HTML (HyperText Markup Language) was created by Tim Berners-Lee in 1991 as a standard for creating web pages. It's a markup language used to structure content on the web, defining elements like headings, paragraphs, links, and images. HTML forms the backbone of web content. In Iayman's terms, HTML is like the skeleton of a website.",
                'course_id'=>3
            ],
            [
                'title'=>'Introduction to JavaScript',
                'content'=>'JavaScript is a <i>lightweight, cross-platform, single-threaded, <\i> and <i>interpreted compiled</i> programming language. It is also known as the scripting language for webpages. It is well-known for the development of web pages, and many non-browser environments also use it.
                JavaScript is a <u>weakly typed language</u> <b>(Dinamically types)</b>. JavaScript can be used for <u>Client-side</u> development as well as <u>Server-side</u> developments. JavaSript is both an imperative and declarative type of language.
                <ul>
                <li><b>Client-side</b>: It supplies objects to control a browser and its <u>Document Object Model (DOM)</u>. Like if client-side extensions allow an application to place elements on an HTMK form and respond to uer events such as <b>mouse clicks, form input, and page navigation</b>. Usefull libraries for the client-side are <b>AngularJS, ReactJS, VueJS</b>,  and so many others./li>
                <li><b>Server-side</b>: It supplies object relevant to running JavaScript on a server. For if the server-side extensions allow an applications to communicate with a database, ans provide continuity of information from one invocation to another of the application, or perform file manipulations on a server. The useful framework which is the most famous these days is <b>node.JS</b>.</li>
                <li><b>Imperative Language</b>: In this type of language we are mostlu concerned about how it is to be done. it simply controls the flow of computation. The procedural programming approach, object, oriented approach comes under this as async await we are thinking about what is to be done further after the async call.</li>
                </ul>',
                'course_id'=>4
            ],
            [
                'title'=>'Introduction to CSS',
                'content'=>"CSS (Cascading Style Sheets) is a language designed to simplify the process of making web pages presentable. It allows you to apply styles to HTML documents, describing how a webpage should look by prescribing colors, fonts, spacing and positioning. CSS provides developers and designers with powerfull control over the presentation of HTML elements.
                HTML uses tage and CSS uses rulesets. CSS styles are applied to the HTML element using selectors. CSS is easy to learn and understand, but it provides powerfull control over the presentation of an HTML document.
                <strong>Why CSS?</strong>
                <ul>
                <li>Saves time: Write CSS once and reuse it across multiple HTML pages.</li>
                <li>Easy maintenance: Change the style globally with a single modification.</li>
                <li>Search engine friendly: Clean coding technique that improves readability for search engines.</li>
                <li>Superior styles: offer a wider array of attributes compared to HTML.</li>
                <li>Offline browsing: CSS can store web applications locally using offline cache, allowing offline viewing.</li>
                </ul>",
                'course_id'=>5
            ]

        ]);
    }
}

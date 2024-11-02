<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learnify</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo/learnify-logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
 
    @vite('resources/css/app.css')

    <style>

      html {
        scroll-behavior: smooth;
      }
       
  
    
    </style>
</head>
<body class="bg-gray-800">
       
    @include('components.navbar-main')

   
        @yield('content')
   
    
    @include('components.footer-main')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      const questions = document.querySelectorAll('.question-btn');
  
      questions.forEach(question => {
        question.addEventListener('click', function() {
          const answerId = this.getAttribute('data-toggle');
          const answer = document.getElementById(answerId);
  
          // Toggle display of the answer
          if (answer.style.display === 'none' || !answer.style.display) {
            answer.style.display = 'block';
          } else {
            answer.style.display = 'none';
          }
  
          // Toggle the icon rotation
          this.querySelector('svg').classList.toggle('rotate-180');
        });
      });
    });
  </script>
  

   
 
    
</body>
</html>
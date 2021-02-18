<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comment System</title>

        <!-- Tailwind css -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Montserrat', sans-serif;
                height: 100vh;
                margin: 0;
            }
        </style>

        <script src="https://use.fontawesome.com/eb15f48cc6.js"></script>
    </head>
    <body>

        <div id="main">
            <section class="content py-20 pb-10">
                <div class="container mx-auto">
                    <h1 class="text-3xl md:text-6xl font-bold text-center mb-10">This is my blog</h1>
                    
                    <div class="content mx-auto w-10/12 md:w-7/12">
                        <div class="flex flex-col md:flex-row justify-between mb-8">
                            <span class="text-sm">By: <b>Junard Oclarit</b> <span class="ml-10 text-sm">3 hours ago</span></span>
                            <div class="flex items-center mt-3 md:mt-0">
                                <span class="mr-2 text-xs font-bold uppercase">Share this: </span>
                                <ul class="flex">
                                    <li class="mr-3"><a href="#" class="text-lg"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="#" class="text-lg"><i class="fa fa-twitter-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="mb-8"><img src="https://picsum.photos/1000/500" class="" /></p>
                        <p class="mb-4">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                        <ul class="list-disc ml-4 mb-4">
                            <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</li>
                            <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                            <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                            <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.</li>
                        </ul>
                        <p class="mb-4">Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>                     
                    </div>
                </div>
            </section>
    
            <section class="comment-section pb-10">
                <div class="container mx-auto">
                    <div class="content mx-auto w-11/12 md:w-7/12">
                        <h3 class="font-bold text-2xl mb-6">Comments</h3>
                        <comment-section></comment-section>
                        <div class="comment-form">
                            <comment-form parent_id="" reply_is_clicked="true"></comment-form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

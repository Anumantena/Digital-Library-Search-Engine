<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 
        <!-- Styles -->
 
         <!-- <link href="css/app.css" rel="stylesheet">        --> 
         <style>
         html, body {
                background-color: black;
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .header{
height:100vh;
left:50%;
background-position: center;
display:flex;
justify-content:center;
align-items:center;
font-family:sans-serif;
}
h1
{

    color:white;
    margin-bottom: 200px;
    margin-top:8px;
    font-size: 50px;
    letter-spacing: 2px;

}

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            /* .m-b-md {
                margin-bottom: 30px;
            } */
            .form-box .search{

   height:30px;
   width:80%;
   padding:15px 20px;
   border: none;
   border-radius:35px;
   font-weight:bold;
   outline:black;

}

/* .form-box .speech img {
        float:right;
        width:40px
      } */

.search-btn
{
   height: 56px;
   width: 14%;
   padding:15px 15px;
   background: #ffeb3b;
   border: black;
   color: #000;
 /* position:relative; */
   cursor:pointer;
   border-radius: 25px;
   text-align:center;

}
/* .form-box .advsearch{

   height:30px;
   width:30%;
   padding:15px 20px;
   border: none;
   border-radius:35px;
   font-weight:bold;
   outline:black;

}
.advsearch-btn
{ 
   position: absolute;
   top:150%;
   left: 35%;
   height: 36px;
   width: 34%;
   padding:5px;
   /* background: #ffeb3b; */
   /* border: black;
   color: #000; */
 /* position:relative; */
   /* cursor:pointer; */
   /* border-radius: 25px; */
   /* text-align:center; */


/* } */ */
.search-btn:hover{
   background: #ffc107;
   cursor: pointer;
}

.form-box
{
position: absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
background:none;
max-width:500px;
width:65%;
padding:10px;
border-radius: 5px;
display:flex;
justify-content: space-between;
}
/* .speech {
        border: 1px solid #DDD;
        width:300px;
        padding:0;
        margin:0
      }

      .speech input {
        border:0;
        width:240px;
        display:inline-block;
        height:30px;
        font-size: 14px;
      }

      .speech img {
        float:right;
        width:40px
      } */

         </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                        <a href="{{ url('/home') }}">Home</a>
                         @auth
                         <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <!-- <div class="title m-b-md">
                Digital Library -->

        <div class="header">
		<form id="labnol" action="{{URL::to('/search')}}" method="POST" role="search">
        {{ csrf_field() }}
      <h1> DIGITAL LIBRARY</h1>
		  <div class="form-box">
          <input type ="text" class="search" name="q" placeholder = "Search a book" id="transcript" />
          <img onclick="startSearch()" src="//i.imgur.com/cHidSVu.gif" />
          <button class ="search-btn" type="submit"> Search</button><br>
</div>
</div>

<!-- HTML5 Speech Recognition API -->
<script type="text/javascript">
  function startSearch() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('q').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>
 
          <br>
        
      </form>
                </div>
            </div>
        </div>
    </body>

</html>
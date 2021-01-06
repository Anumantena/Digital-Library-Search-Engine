@extends('layouts.app')

@section('content')
 
       <body>
       <form action="{{URL::to('/search')}}" method="POST" role="search">
        {{ csrf_field() }}
          <div class="form-box" style="padding:150px 400px;" >
          <input type ="text" class="search" style=" width:80%; height:40px;" name="q" placeholder = "Search a book" id="transcript" />
          <img onclick="startSearch()" src="//i.imgur.com/cHidSVu.gif" />
          <button class ="search-btn" type="submit"> Search</button><br>
		  
        <br>
        <br>
      <form action="{{URL::to('/advanced_search')}}" method="POST">
        {{ csrf_field() }}
		  <div class="form-box">
		  <button class ="search-btn" style=" width:40%; height:40px;" type="submit"> Advanced Search</button>
      </form>
      <br>
      <br>
      <form action="{{URL::to('/uploadfile')}}" method="POST">
        {{ csrf_field() }} 
          <button class ="search-btn" style=" width:40%; height:40px;" type="submit"> Add New Data</button>
          </form> 

      
                </div>
                </body>
@endsection

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
 

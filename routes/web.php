<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can    web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/download', function () {
  // $file = $_GET["/dissertation"] .".pdf"; 
  $file = public_path('/dissertation/".$lhnum."/".$lpdf."').".pdf";
  foreach($file as $source ){
$lhnum = (isset($source['_source']['handle']) ? $source['_source']['handle'] : ""); 
$lpdf = (isset($source['_source']['relation_haspart']) ? $source['_source']['relation_haspart'] : ""); 
  //   $relativeName = basename($value);
  }
  $header = array(
    'Content-Type: application/pdf',
  );

  return response() -> download(public_path($file));
});


Route::get('/', function () {return view('welcome');});
Route::get('/save', function () {return view('save');});

Route::post('/advanced_search', function () {return view('advanced_search'); });
Route::post('/uploadfile',function() {return view('uploadfile');});
// Route::GET('/saved',function() {return view('saved');});
Route::get('/data', function () {return view('projectdata');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/saved',[App\Http\Controllers\savedController::class, 'index']);
// Route::POST('/saved',[App\Http\Controllers\savedController::class, 'store']);

Route::get('/save', function () {
    $users = DB::table('savedister')->select('id','title','author','degree_grantor', 'publisher','identifier_uri', 'description_abstract')->get();
    return view('save', compact('users'));
});

Route::get('/searchist', function () {
    $users = DB::table('searchhistories')->select('id','keyword')->get();
    return view('searchist', compact('users'));
});

Route::get('delete-records','Delete@index');
Route::get('delete/{id}','Delete@destroy');
// Route::get('/', [\App\Http\Controllers\DissertationController::class, 'index']);
// Route::get('/dissertations/saved',[\App\Http\Controllers\DissertationController::class, 'listSaved'])->middleware('auth');

// Route::get('post/{id}/islikedbyme', 'API\PostController@isLikedByMe');
// Route::post('post/like', 'API\PostController@like');

// Route::group(['prefix' => 'dissertations'], function() {
//     Route::get('/', [\App\Http\Controllers\DissertationController::class, 'index']);
//     Route::get('/saved',[\App\Http\Controllers\DissertationController::class, 'listsaved'])->middleware('auth');
//     Route::post('/saved',[\App\Http\Controllers\DissertationController::class, 'save'])->middleware('auth');
//     Route::get('/{id}',[\App\Http\Controllers\DissertationController::class, 'detail']);
//     Route::get('/{id}/save',[\App\Http\Controllers\DissertationController::class, 'save'])->middleware('auth');
//     Route::get('/{id}/remove',[\App\Http\Controllers\DissertationController::class, 'remove'])->middleware('auth');
//     Route::get('like/{slug}', [\App\Http\Controllers\DissertationController::class, 'like']); 

// });
Route::get('/saved', function () {return view('saved');});
// Route::any('/saved', [App\Http\Controllers\DissertationController::class,'save']);
//     Route::POST('/saved',[\App\Http\Controllers\DissertationController::class, 'listSaved'])->middleware('auth');


// Route::get('/searchist',[\App\Http\Controllers\searchhistController::class, 'index'])->middleware('auth');

// Route::get("search1", [DissertationController::class, 'search']);
Route::post('/search', function (Request $request) {
    $input = $request->get("q");
    $input1 = $request->get("submit");
    echo $input1;

    // $q=htmlspecialchars($input);
    $q = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $input);
    // echo($q);
    if ($input != "") {
        
        $searchParams = [
        'index' => 'projectdata',
        'body' => [
          'query' => [
            'bool' =>[
              'must' =>[
                'multi_match' =>[
                'query'=> $q,
                'fields' => ['handle','contributor_author','title','type','subject','description_abstract','degree_grantor'.
              'contributor_department','contributor_committeemember','contributor_committeechair','publisher']
                  ]
                ]
              ]
              ],
        'size'=>1000
        ]
      ];
      return view('SERP',["sparam"=>$input])->withquery($searchParams);
    }
    else
    {
     $title = $request->get('title'); 
     $author = $request->get('author'); 
     $dept= $request->get('dept'); 
     $university = $request->get('university'); 
     $degree_name = $request->get('degree_name'); 

      
      if ($title != "" || $author != "" || $dept != "" || $university != "" || $degree_name != "")
      {
        $advParams =  [
          'index' => 'projectdata',
          'body' => [
            'query' => [
              'bool' =>[
                'must' =>[
                  'match' =>[
                  'title'=> $title ?? '',
                ],
                'match' =>[
                  'contributor_author'=> $author ?? '',
                ],
                  ]
                ]
              ],
          'size'=>50
          ]
        ];
    
        return view('SERP',["sparam"=>$input])->withquery($advParams);
      }
      else
      {
        return redirect('/');
      }
    }
    return view('advanced_search');
});

// $url = $_SERVER['HTTP_REFERER'];


// $thisID= user()->id;
// $title=Request('title');
// $sourceURL=Request('sourceURL');
// $description=Request('description');
// $publisher=Request('publisher');
// $mysqli = new mysqli("127.0.0.1", "admin", "monarchs", "amant");
// $link = mysqli_connect("127.0.0.1", "admin", "monarchs", "amant");
// Route::get('/saved', function () {
//     $sql = DB::table('save')->select(user_id, title, url, description_abstract, publisher)->get('$thisID','$title','$sourceURL','$description','$publisher');    
//     if(mysqli_query($link, $sql)){
//     return view('saved', compact('users'));
// }
// });


// $title = $request->get('title'); 
//      $author = $request->get('author'); 
//      $dept= $request->get('dept'); 
//      $university = $request->get('university'); 
//      $degree_name = $request->get('degree_name'); 


Auth::routes();



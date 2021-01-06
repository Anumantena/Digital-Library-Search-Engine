<?php

namespace App\Http\Controllers;

use App\Dissertation;
use DB;
use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
// words to be removed
# used words as key for better performance
// remove stopwords from string

// function strip_stopwords($str = "")
// {
//     $stopwords = array(
//         'and' => 1,
//         'or' => 1,
//         'a' => 1,
//         'the' => 1
//     );

//     // 1.) break string into words
//     // [^-\w\'] matches characters, that are not [0-9a-zA-Z_-']
//     // if input is unicode/utf-8, the u flag is needed: /pattern/u
//     $words = preg_split('/[^-\w\']+/', $str, -1, PREG_SPLIT_NO_EMPTY);

//     // 2.) if we have at least 2 words, remove stopwords
//     if(count($words) > 1)
//     {
//         $words = array_filter($words, function ($w) use (&$stopwords) {
//             return !isset($stopwords[strtolower($w)]);
//             # if utf-8: mb_strtolower($w, "utf-8")
//         });
//     }

//     // check if not too much was removed such as "the the" would return empty
//     if(!empty($words))
//         return implode(" ", $words);
//     return $str;
// }

// class DissertationController extends Controller
// {
//   public function index(Request $request){
//     $keyword = $request->input('query');
//     if ($keyword != "")
//     {
//       $keyword = strip_stopwords($keyword);
//       $words = null;
//       if (!empty($keyword))
//       {
//         $words = explode(" ", $keyword);

//         $per_page = $request->get('limit', 10);
//         $from = ($request->get('page', 1) - 1) * $per_page;

//         $searchParams =
//         [
//           'index' => 'projectdata',
//           'size' => 500,
//           // 'from' => $from,
//           'body' => [
//             'query' => [
//               'bool' =>[
//                 'should' =>[
//                   'multi_match' =>[
//                   'query'=> $keyword,
//                   'fields' => ['contributor_author','title','type','subject','description_abstract','degree_grantor'.
//                 'contributor_department','contributor_committeemember','contributor_committeechair','publisher','degree_name',
//               'relation_haspart','description_provenance']
//                     ]
//                   ]
//                 ]
//               ]
//             ]
//         ];

//         $user = auth()->user();
//         if ($user)
//         {
//           $history = new SearchHistory();
//           $history->user_id = $user->id;
//           $history->keyword = strtolower($keyword);
//           $history->save();
//         }
//         //Here search is not working with paginate. Without search pagination works.
//         $projectdata = Dissertation::paginate(10);

//         return view('dissertations.index', ["keyword"=>$keyword])
//             ->withquery($searchParams)
//             ->with('dissertations',$projectdata)
//             ->with('words' , $words)
//             ->with('keyword', $keyword);
//       }
//     }else{
//     return back();
//   }
// }

//   public function detail($id){
//       $dissertation = Dissertation::find($id);

//       if (!$dissertation) {
//           return back();
//       }

//       return view('dissertations.detail',[
//           'dissertation' => $dissertation
//       ]);
//   }

//   public function save($id) {
//       $dissertation = Dissertation::find($id);
//       if (!$dissertation) {
//           return back();
//       }
//       $user = auth()->user();
//       $user->saved_dissertations()->attach($id);
//       return redirect('/dissertations/saved');
//   }
//   public function remove($id){
//     $dissertation = Dissertation::find($id);
//     if (!$dissertation) {
//       return back();
//   }
//   $user = auth()->user();
//   $user->saved_dissertations()->detach($id);
//   return redirect('/dissertations/saved');
//   }

 
//   public function getHistory(){
//     // Get the currently authenticated user...
//     $user = Auth::user();
//     // Get the currently authenticated user's ID...
//     $id = Auth::id();

//     $history = SearchHistory::where('user_id',$id)->paginate();
//     $user = auth()->user();
//     // $history = $user->histories()->paginate();
//     return view('dissertations.searchist',  [
//           'history' => $history
//     ]);
//     }


  // public function listSaved() {
  //     $user = auth()->user();
  //     $projectdata = $user->saved_dissertations()->paginate();

  //     return view('dissertations.saved', [
  //         'dissertations' => $projectdata
  //     ]);
  // }

//   public function paginateSearch(Request $request){
//     // $access = $request->get('access');
//     $keyword = $request->input("query");
//     echo "My query : ".$keyword;

//     // }else{
//     //   return redirect('/');
//     // }
//   }
//  public function toggleFavorite($id) {
//  $article = ArticleCategory::find($id);//get the article based on the id
//  Auth::user()->toggleFavorite($article);//add/remove the user from the favorite list
//  return Redirect::to('article/{$id}');//redirect back (optionally with a message)
// }
  
// }
class DissertationController extends Controller
{
     public function create()
     {
       return view('/saved');
     }
     public function display()
     {
       return view('/search');
     }
      
     public function save(Request $request)
     {
       $q=$request->input('q');
       return view('/saved')->with($q);
     }

  //    public function listSaved() {
  //     $user = auth()->user();
  //     $projectdata = $user->saved_dissertations()->paginate();

  //     return view('dissertations.saved', [
  //         'dissertations' => $projectdata
  //     ]);
  // }

    }
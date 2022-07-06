<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Quest;
use Illuminate\Http\Request;

	class PostController extends Controller 
	{
		public function index() {
			if (Auth::check()) {
			$quests = Quest::all()->where('user_id','=',Auth::user()->id);
			return view('welcome',compact('quests')); 
			} else {
				return redirect('login');
			}
		}
		public function store(Request $request){
			$data = $request->validate([
				'quest'=>'required'
			]);
			$data = new Quest();
			$data->user_id = Auth::user()->id;
			$data->quest = $request->input('quest');
			$data->save();
			return back();
			}
		public function destroy($id) {
			Quest::destroy($id); 
			return back();
		}
		
	}
?>
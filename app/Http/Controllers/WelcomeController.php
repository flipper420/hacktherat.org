<?php

namespace App\Http\Controllers;
use App\Charts\UsersChart;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class WelcomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
    	$chart = new UsersChart;
    	$data = collect([]);
    	$names = collect([]);
        $categories = Category::withCount('Missions')->whereType('Mission')->get();
        foreach($categories as $category) {
        	$names->push($category->name);
        	$data->push($category->missions_count);
        }
		// $data = Mission::orderBy('difficulty', 'desc')->limit(10)->get()->pluck('reward', 'name');
		// //dd($data);
		$chart->labels($names->values());
		$chart->dataset('# of Challenges', 'bar', $data->values())->options(['color' => '#f08d49','backgroundColor' => ['green', 'red', 'orange', 'blue', 'purple', 'yellow', 'lime', 'lightblue', 'black'],'fill' => true]);;
        return view('chart_view', ['chart' => $chart]);
        //return view('welcome');
    }
}

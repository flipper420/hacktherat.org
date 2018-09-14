<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\Mission;
use App\Models\Point;
use App\Traits\GameTrait;
use App\Http\Requests\SubmitMissionPassword;


class MissionController extends Controller
{
    use GameTrait;
    protected $id, $name, $mission, $category, $mission_password, $points;
    protected $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    /**
     * Show the mission password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showpasswordform()
    {
        $categories = Category::all();
        return view('missions.password', compact('categories'));
    }

    /**
     * Validate submitted password.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitpassword(SubmitMissionPassword $request)
    {
        $this->set();
        if($this->checkCompleted()) {
            $this->getMissionPassword();
            if ($this->password !== md5($this->mission_password)) {
                $p = new Point();
                $p->wrongPassword($this->request->user()->id);
                return view('missions.errors.wrong_password');
            } else {
                $this->getReward();
                $this->logMissionCompleted();
                $points = $this->points;
                return view('missions.right_password', compact('points'));
            }
        } else {
            return view('missions.errors.already_completed');
        }
    }

    public function set()
    {
        if (Input::has('category')) {
            $this->id = (int) Input::get('category');
        }
        if (Input::has('mission')) {
            $this->name = (string) Input::get('mission');
        }
        if (Input::has('password')) {
            $this->password = (string) md5(Input::get('password'));
        }
    }

    // TODO: add docbloc

    public function getMissionPassword()
    {
        $this->mission_password = Mission::get()->where('category_id', $this->id)->where('name', $this->name)->pluck('password')->first();
    }

    // TODO: add docbloc
    public function getReward()
    {
        $this->points = Mission::get()->where('category_id', $this->id)->where('name', $this->name)->pluck('reward')->first();
        $p = new Point();
        $p->addReward($this->request->user()->id, $this->points, 'Completed Mission ' . $this->name . ' in mission category #' . $this->id);

    }

    // TODO: add docbloc

    public function logMissionCompleted()
    {
        DB::table('completed_missions')->insert(['user_id'     => $this->request->user()->id,
                                                 'category_id' => $this->id,
                                                 'mission_id'  => $this->getMissionId(),
                                                 'created_at'  => \Carbon\Carbon::now(),
                                                 'updated_at'  => \Carbon\Carbon::now()]);
    }

    // TODO: add docbloc

    public function getMissionId()
    {
        return Mission::get()->where('category_id', $this->id)->where('name', $this->name)->pluck('id')->first();
    }

    public function checkCompleted(): bool
    {
        $mission = DB::table('completed_missions')->where('user_id', $this->request->user()->id)->where('category_id', $this->id)->where('mission_id', $this->getMissionId())->exists();
        if(!$mission) {
            return true;
        } else {
            return false;
        }
    }
}

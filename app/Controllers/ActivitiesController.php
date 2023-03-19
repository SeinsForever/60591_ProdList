<?php
namespace App\Controllers;

use App\Models\ActivitiesModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        $activities = ActivitiesModel::all();
        return $this->view('activities.php', ['users' =>  $request->getUser(), 'message' => $request->getSession()['msg'], 'activities' => $activities]);
    }
}
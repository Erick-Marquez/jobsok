<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\Technician;
use App\Models\User;
use App\Repositories\TechnicianRepository;
use App\Repositories\UserRepository;
use App\Services\UserRecommendationService;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{

    private $userRecommendationService;

    public function __construct()
    {
        $this->userRecommendationService = new UserRecommendationService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $user = (new UserRepository)->findWithCity($id);
        $professions = Profession::all();
        $technicians = $this->userRecommendationService->getTechnicianRecommendations($id);

        return response()->json([

            'user' => $user,
            'professions' => $professions,
            'technicians' => $technicians

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePreference(Request $request, $id)
    {
        
        return $this->userRecommendationService->updateUserRecommendation($request, $id);

    }

    public function filterTechnician($id)
    {
        
        $technician = (new TechnicianRepository)->findTechnicianWithAllRelations($id);

        return response()->json([

            'technician' => $technician,

        ]);

    }

}

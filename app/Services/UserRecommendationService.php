<?php

namespace App\Services;

use App\Repositories\TechnicianRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use DateTime;

class UserRecommendationService
{

    private $userRepository;
    private $technicianRepository;


    public function __construct()
    {

        $this->userRepository = new UserRepository;

        $this->technicianRepository = new TechnicianRepository;

    }

    public function getTechnicianRecommendations($user)
    {

        $city = $this->userRepository->findUserCity($user);
        $userRecommendation = $this->userRepository->getUserPreference($user);

        $this->technicianRepository->filterTechnicianForCity($city);
        $this->technicianRepository->filterTechnicianForWarranty();
        $this->technicianRepository->filterTechnicianForPreferences($userRecommendation);
  
        $technicians = $this->technicianRepository->getTechnicians();


        $filterUp = [];
        $filterDown = [];

        foreach ($technicians as $technician) {

            $isTheRecommendation = false;
            
            foreach ($technician->professions as $profession) {

                $isTheRecommendation =  $profession->id == $userRecommendation ? true : $isTheRecommendation;

            }

            $isTheRecommendation ? array_push($filterUp, $technician) : array_push($filterDown, $technician);;

        }

        $technicians = array_merge($filterUp, $filterDown);
        
        return $technicians;

    }

    public function updateUserRecommendation($request, $id)
    {

        $user = $this->userRepository->findUserRecommendations($id);

        $recommendations = [];

        foreach ($request as $profession) {
            
            $haveRecommendation = false;

            foreach ($user->recommendations as $userRecommendation) {
                
                if ($userRecommendation->pivot->profession_id == $profession->id) {

                    $recommendations[$profession->id] = ['quantity' => $userRecommendation->pivot->quantity + $profession->quantity];

                    $haveRecommendation = true;
                }

            }

            if (!$haveRecommendation) {

                $recommendations[$profession->id] = ['quantity' => $profession->quantity];

            }


        }

        return $user->recommendations()->sync($recommendations);

    }
}
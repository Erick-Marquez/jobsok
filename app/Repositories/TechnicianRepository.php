<?php

namespace App\Repositories;

use App\Models\Technician;

class TechnicianRepository
{

    private $filter;

    public function getAllTechnicians()
    {
        return Technician::all();
    }

    public function findTechnician(int $id)
    {
        return Technician::findOrFail($id);
    }

    public function filterTechnicianForCity(int $id)
    {
        $this->filter = Technician::orderByRaw('FIELD (city_id, ' . $id . ') DESC');
        return $this;
    }

    public function filterTechnicianForPreferences($id)
    {
        $this->filter->with(['professions', 'city']);
        return $this;
    }

    public function filterTechnicianForWarranty()
    {
        $this->filter->orderBy('have_warranty', 'DESC');
        return $this;
    }

    public function getTechnicians()
    {
        return $this->filter->get();
    }

    

}
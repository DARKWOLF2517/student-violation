<?php

namespace App\Http\Controllers;

use App\Models\ViolationType;
use Illuminate\Http\Request;

class SanctionController extends Controller
{
    //
    public function getViolationListWithSanction()
    {   
        $violation_list = ViolationType::with('sanction')->get();
        return $violation_list->toJson();

            
    }
}

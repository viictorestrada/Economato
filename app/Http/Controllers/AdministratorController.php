<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Program;
use App\Models\Characterization;
use App\Models\Competence;

class AdministratorController extends Controller
{

  public function configurations()
  {
    $region = Region::all();
    $program = Program::all();
    $characterization = Characterization::all();
    $competence = Competence::all();

    return view('configurations.index', compact('region','program','characterization','competence'));
  }

}

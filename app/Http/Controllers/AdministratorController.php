<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Complex;
use App\Models\Program;
use App\Models\Characterization;
use App\Models\Competence;
use App\Models\Location;

class AdministratorController extends Controller
{

  public function configurations()
  {
    $region = Region::all();
    $program = Program::all();
    $characterization = Characterization::all();
    $competence = Competence::all();
    $complex = Complex::all();
    $location = Location::all();

    return view('configurations.index', compact('region','program','characterization','competence', 'complex', 'location'));
  }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable =['program_id', 'characterization_id' ,'file_number', 'file_route', 'apprentices', 'start_date' , 'finish_date' , 'status'];

    public $timestamps = false;

    public static function Characterization($id){
      $characterization=File::select('characterizations.characterization_name')
      ->join('characterizations', 'files.characterization_id','=','characterizations.id')
      ->where('files.id',$id)->get()->first();
      $characterizationFile=$characterization->characterization_name;
      return $characterizationFile;
    }
}

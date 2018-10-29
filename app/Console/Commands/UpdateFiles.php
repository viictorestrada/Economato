<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\File;


class UpdateFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizando fichas por fecha de clausura';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filesData=File::where('status',1)->get();
        foreach($filesData as $key){
          if(date('Y-m-d')>=$key['finish_date']){
            File::findOrfail($key['id'])->update(['status'=>0]);
          }
        }
        $this->info("tarea de ficha ejecutada");
    }
}

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Log;

class GenerateCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    protected $filename;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 120;

    
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $filename)
    {
        $this->data = $data;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->filename = public_path('export\\'.$this->filename.'.csv');
        try {
            if (($file = fopen($this->filename, 'w')) !== false) {
                foreach ($this->data as $line) {
                    fputcsv($file, explode(',', $line)) or
                    Log::error('Sorry, could not write to the file. Please check file or folder permission.');
                }
                fclose($file);
                return true;
            }
            Log::error('Sorry, file could not be open/written. Missing write file permission '.public_path());
            return false;
        } catch (Exception $e) {
            Log::error('Error! Check file permission or if file is opened already. '.$e->getMessage());
            return false;
        }
    }
}

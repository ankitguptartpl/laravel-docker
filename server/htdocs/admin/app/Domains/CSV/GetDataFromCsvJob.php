<?php


namespace App\Domains\CSV;

use Lucid\Foundation\Job;

/**
 * Class CsvLibrary
 *
 * @purpose : This job is used for get data from CSV file
 *
 * @created_by : Arif Khan
 * @created_at : Oct,30 2019 at 05.00 PM
 *
 * @package App\Domains\CSV
 */
class GetDataFromCsvJob extends Job
{
    protected $filename;
    protected $deliminator;

    /**
     * GetDataFromCsvJob constructor.
     * @param $filename
     * @param string $deliminator
     */
    public function __construct($filename, $deliminator = ",")
    {
        $this->filename = $filename;
        $this->deliminator = $deliminator;
    }

    /**
     * handle()
     * @purpose : Collect data from a given CSV file and return as array
     *
     * @created_by : Arif Khan
     * @created_at : Oct,30 2019 at 05.00 PM
     *
     * @return array|bool
     */
    public function handle()
    {
        if(!file_exists($this->filename) || !is_readable($this->filename))
        {
            return FALSE;
        }

        $header = [];
        $data = array();

        if(($handle = fopen($this->filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, 1000, $this->deliminator)) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}

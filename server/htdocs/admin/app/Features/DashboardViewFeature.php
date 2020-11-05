<?php

namespace App\Features;

use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

/**
 * Class LoginViewFeature
 *
 * @purpose : This class is used for show dashboard view
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Features
 */
class DashboardViewFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for show dashboard view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        return $this->run(ReturnWithViewJob::class,[
            'template' => 'dashboard.index',
            'data' => ['title' => 'Dashboard']
        ]);
    }
}

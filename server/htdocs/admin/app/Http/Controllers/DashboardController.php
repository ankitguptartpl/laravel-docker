<?php

namespace App\Http\Controllers;

use App\Features\DashboardViewFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class DashboardController
 *
 * @purpose : This controller is used for user dashboard purpose
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * dashboardView()
     *
     * @purpose : This function is used for show dashboard view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardView()
    {
        return $this->serve(DashboardViewFeature::class);
    }
}

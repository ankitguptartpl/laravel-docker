<?php

namespace App\Http\Controllers;

use App\Features\CmsPagesEditFeature;
use App\Features\CmsPagesListFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class CmsPagesController
 *
 * @purpose : This controller is used for cms pages management
 *
 * @created_by : Chandan Kumar
 * @created_at : 4th Nov, 2020 at 13.10
 *
 * @package App\Http\Controllers
 */
class CmsPagesController extends Controller
{
    /**
     * cmsPagesListView()
     *
     * @purpose : This function is used for show CMS Pages List view
     *
     * @created_by : Chandan Kumar
     * @created_at : 4th Nov, 2020 at 13.10
     *
     * @return \Illuminate\Http\Response
     */
    public function cmsPagesListView()
    {
        return $this->serve(CmsPagesListFeature::class);
    }

    /**
     * cmsPagesEdit()
     *
     * @purpose : This function is used for edit CMS Pages
     *
     * @created_by : Chandan Kumar
     * @created_at : 4th Nov, 2020 at 16::40
     *
     * @return \Illuminate\Http\Response
     */
    public function cmsPagesEdit()
    {
        return $this->serve(CmsPagesEditFeature::class);
    }


}

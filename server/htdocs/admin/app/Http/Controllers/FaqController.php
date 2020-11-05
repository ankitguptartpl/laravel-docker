<?php

namespace App\Http\Controllers;

use App\Features\AddFaqFeature;
use App\Features\DeleteFaqFeature;
use App\Features\EditFaqFeature;
use App\Features\ListFaqFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class CmsPagesController
 *
 * @purpose : This controller is used for cms pages management
 *
 * @created_by : Chandan Kumar
 * @created_at : 5th Nov, 2020 at 16::10
 *
 * @package App\Http\Controllers
 */
class FaqController extends Controller
{
    /**
     * add()
     *
     * @purpose : This function is used for add FAQ
     *
     * @created_by : Chandan Kumar
     * @created_at : 5th Nov, 2020 at 16::10
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return $this->serve(AddFaqFeature::class);
    }

    /**
     * add()
     *
     * @purpose : This function is used for list FAQ
     *
     * @created_by : Chandan Kumar
     * @created_at : 5th Nov, 2020 at 16::55
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        return  $this->serve(ListFaqFeature::class);

    }

    /**
     * edit()
     *
     * @purpose : This function is used for edit FAQ
     *
     * @created_by : Chandan Kumar
     * @created_at : 5th Nov, 2020 at 17::20
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        return $this->serve(EditFaqFeature::class);
    }


    /**
     * add()
     *
     * @purpose : This function is used for delete FAQ
     *
     * @created_by : Chandan Kumar
     * @created_at : 5th Nov, 2020 at 18::10
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy() {
        return $this->serve(DeleteFaqFeature::class);
    }

}

<?php

namespace App\Features;

use App\Data\Models\CmsPage;
use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

/**
 * Class CmsPagesListFeature
 *
 * @purpose : This controller is used for cms pages management
 *
 * @created_by : Chandan Kumar
 * @created_at : 4th Nov, 2020 at 13.10
 *
 * @package App\Features
 */

class CmsPagesListFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for show cms pages list view
     *
     * @created_by : Chandan Kumar
     * @created_at : 4th Nov, 2020 at 13.10
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     * */
    public function handle(Request $request)
    {
        $cms_pages = CmsPage::all();

        return $this->run(ReturnWithViewJob::class,[
            'template' => 'cms.list',
            'data' => ['title' => 'CMS Pages', 'cms_pages' => $cms_pages]
        ]);
    }
}

<?php

namespace App\Features;

use App\Data\Models\CmsPage;
use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use App\Http\Requests\CmsPagesEditRequest;
use Illuminate\Http\Request;
use Lucid\Foundation\Feature;

class CmsPagesEditFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for edit cms pages data
     *
     * @created_by : Chandan Kumar
     * @created_at : 04 Nov, 2020
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     */
    public function handle(CmsPagesEditRequest $request)
    {

        $cms_page__id = $request->route('id');

        $cms_page = CmsPage::findOrFail($cms_page__id);

        if($request->isMethod('post')) {

            if($request->has('CKEditor')) {
                $file_path =  file_upload_by_ckeditor($request);
                return $file_path;
            }


            $response_array = [
                'redirect_route_name' => '',
                'route_param' => []
            ];

            if($cms_page->update($request->all())) {

                $response_array['success_message'] = __('cms.success_messages.cms_page_updated');
                $response_array['redirect_route_name'] = 'admin.cms.list';
            }

            else {
                $response_array['error_message'] = __('cms.error_messages.cms_page_update_fail');
            }

            return $this->run(RedirectWithSuccessJob::class,$response_array);
        }
        else {
            return $this->run(ReturnWithViewJob::class,[
                'template' => 'cms.edit',
                'data' => ['title' => 'CMS Pages', 'cms_page' => $cms_page]
            ]);
        }
    }
}

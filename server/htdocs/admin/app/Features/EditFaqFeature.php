<?php

namespace App\Features;

use App\Data\Models\Faq;
use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class EditFaqFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for edit faq
     *
     * @created_by : Chandan Kumar
     * @created_at : 05 Nov, 2020 at 17::20
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        $faq_id = $request->route('id');

        $faq = Faq::findOrFail($faq_id);

        if($request->isMethod('post')) {

            if($request->has('CKEditor')) {
                $file_path =  file_upload_by_ckeditor($request);
                return $file_path;
            }


            $response_array = [
                'redirect_route_name' => '',
                'route_param' => []
            ];

            if($faq->update(array_merge($request->all(),created_by_and_updated_by(false)))) {

                $response_array['success_message'] = __('faq.success_messages.faq_updated');
                $response_array['redirect_route_name'] = 'admin.faq.list';
            }

            else {
                $response_array['error_message'] = __('faq.error_messages.faq_update_fail');
            }

            return $this->run(RedirectWithSuccessJob::class,$response_array);
        }
        else {
            return $this->run(ReturnWithViewJob::class,[
                'template' => 'faq.edit',
                'data' => ['title' => 'FAQ', 'faq' => $faq]
            ]);
        }
    }
}

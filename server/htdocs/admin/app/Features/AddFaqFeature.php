<?php

namespace App\Features;

use App\Data\Models\Faq;
use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use App\Http\Requests\AddFaqRequest;
use Illuminate\Http\Request;
use Lucid\Foundation\Feature;

class AddFaqFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for add faq
     *
     * @created_by : Chandan Kumar
     * @created_at : 05 Nov, 2020 at 16::10
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     */
    public function handle(AddFaqRequest $request)
    {
        if($request->isMethod('post')) {

            // Upload image by ckeditor and return file path
            if($request->has('CKEditor')) {
                $file_path =  file_upload_by_ckeditor($request);
                return $file_path;
            }

            $response_array = [
                'redirect_route_name' => '',
                'route_param' => []
            ];

            if(Faq::create(array_merge($request->all(),created_by_and_updated_by()))) {

                $response_array['success_message'] = __('faq.success_messages.faq_added');
                $response_array['redirect_route_name'] = 'admin.faq.list';
            }

            else {
                $response_array['error_message'] = __('faq.error_messages.faq_add_fail');
            }

            return $this->run(RedirectWithSuccessJob::class,$response_array);
        }
        else {
            return $this->run(ReturnWithViewJob::class,[
                'template' => 'faq.add',
                'data' => ['title' => 'Add Faq']
            ]);
        }

    }
}

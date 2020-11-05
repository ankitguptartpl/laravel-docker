<?php

namespace App\Features;

use App\Data\Models\Faq;
use App\Domains\HttpResponse\Web\RedirectWithErrorJob;
use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeleteFaqFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for delete faq
     *
     * @created_by : Chandan Kumar
     * @created_at : 05 Nov, 2020 at 18::10
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {

        $response_array = [
            'redirect_route_name' => '',
            'route_param' => []
        ];

        if(Faq::findOrFail($request->route('id'))->delete()) {
            $response_array['success_message'] = __('faq.success_messages.faq_deleted');
            return $this->run(RedirectWithSuccessJob::class,$response_array);
        }
        else {
            $response_array['error_message'] = __('faq.error_messages.faq_delete_fail');
            return $this->run(RedirectWithErrorJob::class,$response_array);
        }
    }
}

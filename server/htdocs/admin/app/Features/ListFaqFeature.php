<?php

namespace App\Features;

use App\Data\Models\Faq;
use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListFaqFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for show addedd faqs list
     *
     * @created_by : Chandan Kumar
     * @created_at : 5th Nov, 2020 at 16:55
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     * */
    public function handle(Request $request)
    {
        $faqs = Faq::latest()->get();

        return $this->run(ReturnWithViewJob::class,[
            'template' => 'faq.list',
            'data' => ['title' => 'Faqs', 'faqs' => $faqs]
        ]);
    }
}

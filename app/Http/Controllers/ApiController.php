<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\AnalyticsBlock;
use App\Models\AboutBlock;
use App\Models\Block;
use App\Models\Contacts;
use App\Models\Feedback;
use App\Models\MarketAnalysi;
use App\Models\Page;
use App\Models\Question;
use App\Models\Service;
use App\Models\Slider;
use App\Models\WorkPrinciple;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function homePage()
    {
        $lang = request('lang');

        $data['banners'] = Banner::join('translates as title', 'title.id', 'banner.title')
            ->join('translates as content', 'content.id', 'banner.content')
            ->select('banner.id', 'banner.created_at', 'title.' . $lang . ' as title', 'content.' . $lang . ' as content', 'banner.image')
            ->get();

        return response()->json($data);
    }

    public function header()
    {
        $data = Contacts::latest()->select('phone_number')->first();

        return response()->json($data);
    }

    public function footer()
    {
        $data = Contacts::latest()->first();

        return response()->json($data);
    }

    public function about(Request $request)
    {
        $page_general = Page::where('slug', 'about')->first();
        if ($page_general) {
            $data['general']['title'] = $page_general->title;
            $data['general']['meta_title'] = $page_general->meta_title;
            $data['general']['meta_description'] = $page_general->meta_description;
        }
        $data['about_blocks'] = AboutBlock::join('translates as content', 'content.id', 'about_blocks.content')->select('about_blocks.id', 'about_blocks.image', 'content.'.$request->lang.' as content','about_blocks.created_at')->latest()->get();
        $data['work_principles_title'] = Block::where('block_type', 'work_principles')->first();
        $data['work_principles_blocks'] = WorkPrinciple::latest()->get();
        $data['market_analysis'] = MarketAnalysi::latest()->get();

        return response()->json($data);
    }

    public function services()
    {
        $page_general = Page::where('slug', 'service')->first();
        if ($page_general) {
            $data['general']['title'] = $page_general->title;
            $data['general']['meta_title'] = $page_general->meta_title;
            $data['general']['meta_description'] = $page_general->meta_description;
        }
        $data['services'] = Service::latest()->get();

        return response()->json($data);
    }

    public function analytics()
    {
        $page_general = Page::where('slug', 'analytic')->first();
        if ($page_general) {
            $data['general']['title'] = $page_general->title;
            $data['general']['meta_title'] = $page_general->meta_title;
            $data['general']['meta_description'] = $page_general->meta_description;
        }

        $data['analytics'] = AnalyticsBlock::latest()->get();
        return response()->json($data);
    }

    public function contacts()
    {
        $page_general = Page::where('slug', 'contacts')->first();
        if ($page_general) {
            $data['general']['title'] = $page_general->title;
            $data['general']['meta_title'] = $page_general->meta_title;
            $data['general']['meta_description'] = $page_general->meta_description;
        }
        $data['contacts'] = Contacts::latest()->get();

        return response()->json($data);
    }

    public function feedback(Request $request)
    {
        $requestData = $request->all();

        $feedback = new Feedback();

        $feedback->name = $requestData['formData']['name'];
        $feedback->phone_number = $requestData['formData']['phone'];
        $feedback->email = $requestData['formData']['email'];
        $feedback->description = $requestData['formData']['study'];

        if (isset($requestData['formData']['company'])) {
            $feedback->company = $requestData['formData']['company'];
        }
        if (isset($requestData['formData']['viewActivity'])) {
            $feedback->kind_business = $requestData['formData']['viewActivity'];
        }
        if (isset($requestData['formData']['othersComment'])) {
            $feedback->comment = $requestData['formData']['othersComment'];
        }
        if (isset($requestData['formData']['service_id'])) {
            $feedback->service_id = $requestData['formData']['service_id'];
            $feedback->type = 'orders';
        }

        if ($feedback->save()) {
            return true;
        }
    }

}

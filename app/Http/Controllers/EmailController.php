<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CmsPage;
use Hash;
use File;

class EmailController extends Controller
{
    public function index() {
        $page = CmsPage::where('route', 'emails')->firstOrFail();
        $page_fields = json_decode($page['fields'], true);

        $model = 'App\\' . $page['model_name'];
        $rows = $model::when($page['order_display'], function ($query) use ($page) {
            return $query->orderBy('ht_pos');
        })
            ->when($page['server_side_pagination'], function ($query) {
                return $query->paginate(10);
            }, function ($query) {
                return $query->get();
            });

        return view('admin.custom.adminemails', compact('page', 'page_fields', 'rows'), ['page_title' => $page->display_name_plural]);
    }

    public function show($id) {
        $page = CmsPage::where('route', 'emails')->where('show', 1)->firstOrFail();
        $page_fields = json_decode($page['fields'], true);
        $translatable_fields = json_decode($page['translatable_fields'], true);

        $model = 'App\\' . $page['model_name'];
        $row = $model::findOrFail($id);

        return view('admin.custom.adminemail', compact('page', 'page_fields', 'translatable_fields', 'row'), ['page_title' => $page->display_name.' #'.$row->id]);
    }
}

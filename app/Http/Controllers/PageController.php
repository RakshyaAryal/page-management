<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $page= Page::all();
        return view('admin.page.index',compact('page'));

    }
    public function create()
    {
        $page = new Page();
        return view('admin.page.create',compact('page'));
    }
    public function store(Request $request)
    {
        /* validation */
        $this->validate($request, [
            'page_name' => 'required',
            'page_description' => 'required',
        ]);


        $file = $request->file('page_image');
        $input = $request->all();


        if ($file != null) {

            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if ($this->validateImage($extension)) {

                $randomNumber = rand(100000, 9999999);

                $newFileName = $randomNumber . '_' . $fileName;

                $input['page_image'] = $newFileName;
                $destinationPath = 'uploads';
                $file->move($destinationPath, $newFileName);

            } else {

                $request->session()->flash('flash_message', 'Image is not valid!');
                return redirect('admin/page');

            }

        }

        Page::create($input);
        $request->session()->flash('flash_message', 'Page is successfully added!');
        return redirect('admin/page');
    }
    

}

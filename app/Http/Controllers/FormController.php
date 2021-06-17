<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Form;
use App\Rules\AgeCalculator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::take(3)->latest()->get();

        return view("forms.index", compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(form $form)
    {
        $this->authorize('update');
        $form::create($this->storeValidation());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\form $form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(form $form)
    {
        return view("forms.show", compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\form $form
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $this->authorize('update');
        $form = Form::find($id);

        return view('forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\form $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, form $form)
    {
        $this->authorize('update');
        $form->update($this->updateValidation($request));

        return redirect('/forms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\form $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(form $form)
    {
        //
    }

    public function storeValidation()
    {
        return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'purpose' => 'required',
            'year_of_birth' => ['required', 'string', new AgeCalculator()],
            'contact_email' => 'required | email:rfc,dns'
        ]);
    }
    
    public function updateValidation()
    {
        return request()->validate([
            'first_name' => 'required',
            'purpose' => 'required',
            'year_of_birth' => ['required', 'string', new AgeCalculator()],
        ]);
    }
}

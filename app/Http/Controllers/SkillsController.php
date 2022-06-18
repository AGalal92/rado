<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillCategoryRequest;
use App\Http\Requests\SkillCreateRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Requests\UpdateSkillCategoryRequest;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SkillsController extends Controller
{
    public function create()
    {
        $skillCategories = SkillCategory::get();
        return view('Admin.skills.create', compact('skillCategories'));
    }

    public function store(SkillCreateRequest $request)
    {
        Skill::create([
            'name' => $request->name,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'skill_category_id' => $request->skill_category_id,
        ]);
        Session::flash('done', 'Course Was Created');
        return redirect()->back();
    }

    public function index()
    {
        $skills = Skill::with('category')->get();
        return view('Admin.skills.index', compact('skills'));
    }

    public function delete(Request $request)
    {
        $skill= Skill::find($request->id);
        if($skill)
        {
            $skill->delete();
            Session::flash('done', 'Course Was Deleted');
            return back();
        }
        return back()->withErrors(['Course not found']);
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
        $skillCategories = SkillCategory::get();
        return view('Admin.skills.edit', compact('skill', 'skillCategories'));
    }

    public function update(UpdateSkillRequest $request)
    {
        $skill = Skill::find($request->id);

        $skill->update([
            'name' => $request->name,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'skill_category_id' => $request->skill_category_id,
        ]);
        Session::flash('done', 'Course Was Updated');
        return redirect(route('admin.skill.index'));
    }
}

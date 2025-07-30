<?php

namespace App\Http\Controllers;

use App\FormUser;
use App\Option;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function addOptions(Request $request)
    {
        Option::create([
            'type' => $request->industry,
            'label' => $request->label,
            'value' => $request->value,
        ]);
        return response()->json(['message' => 'Option added successfully'], 200);
    }

    public function getOptions(Request $request)
    {
        $options = Option::where('type', $request->type)->get(['value', 'label']);
        return response()->json($options, 200);
    }

    public function updateOptions(Request $request)
    {
        $option = Option::where('type', $request->industry)
            ->where('value', $request->oldValue)
            ->first();

        if (!$option) {
            return response()->json(['message' => 'Option not found'], 404);
        }

        // Update label and value
        $option->label = $request->newLabel;
        $option->value = $request->newValue;
        $option->save();

        return response()->json(['message' => 'Option updated successfully', 'option' => $option], 200);
    }

    public function getUsers()
    {
        $users = FormUser::with(['industryOption', 'jobTitleOption', 'companyOption'])->get();
        return response()->json($users, 200);
    }

    public function saveUser(Request $request)
    {
        $industryId = Option::where('value', $request->industry)->first()->id;
        $jobTitleId = Option::where('value', $request->jobTitle)->first()->id;
        $companyNameId = Option::where('value', $request->companyName)->first()->id;

        FormUser::create([
            'full_name' => $request->fullName,
            'email' => $request->email,
            'phone' => $request->phone,
            'industry_option_id' => $industryId,
            'job_title_option_id' => $jobTitleId,
            'company_option_id' => $companyNameId,
        ]);

        return response()->json(['message' => 'User added successfully'], 200);
    }
}

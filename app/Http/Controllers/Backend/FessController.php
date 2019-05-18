<?php

namespace App\Http\Controllers\Backend;

use App\FeeSetup;
use App\Http\Controllers\Controller;
use App\IClass;
use App\Section;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Redirect;
use Validator;

class FessController extends Controller {

	public function getsetuplist() {
		$fees = array();
		$classes = IClass::all();
		$fees = FeeSetup::all();
		return View::Make('backend.fees.feesSetuplist', compact('classes', 'fees'));
	}

	public function getsetup() {
		$classes = IClass::orderby('id', 'asc')->get();
		return view('backend.fees.feesSetup', compact('classes'));
	}

	public function postSetup() {
		$rules = [

			'class_id' => 'required',
			'type' => 'required',
			'fee' => 'required|numeric',
			'title' => 'required',

		];
		$validator = \Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/fees/setup')->withErrors($validator);
		} else {

			$fee = new FeeSetup();

			$fee->class_id = Input::get('class_id');
			$fee->type = Input::get('type');
			$fee->title = Input::get('title');
			$fee->fee = Input::get('fee');
			$fee->Latefee = Input::get('Latefee');
			$fee->description = Input::get('description');
			$fee->save();
			return Redirect::to('/fees/setup')->with("success", "Fee Save Succesfully.");

		}
	}

	public function feessetup_edit($id) {
		$classes = IClass::all();
		$fee = FeeSetup::find($id);
		return View::Make('backend.fees.feesSetup_edit', compact('fee', 'classes'));
	}

	public function feessetup_update() {
		$rules = [

			'class_id' => 'required',
			'type' => 'required',
			'fee' => 'required|numeric',
			'title' => 'required',
		];
		$validator = \Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/fee/edit/' . Input::get('id'))->withErrors($validator);
		} else {

			$fee = FeeSetup::find(Input::get('id'));
			$fee->class_id = Input::get('class_id');
			$fee->type = Input::get('type');
			$fee->title = Input::get('title');
			$fee->fee = Input::get('fee');
			$fee->Latefee = Input::get('Latefee');
			$fee->description = Input::get('description');
			$fee->save();
			return Redirect::to('/fees/setup/list')->with("success", "Fee Updated Succesfully.");

		}
	}

	public function feessetup_destroy() {

		$fee = FeeSetup::find(Input::get('hiddenId'));

		$fee->delete();
		//todo: need protection to massy events. like modify after used or delete after user
		return Redirect::to('/fees/setup/list')->with('success', 'Fee Setup Deleted!');
	}

	public function getCollection() {
		$classes = IClass::orderby('id', 'asc')->get();
		$section =Section::all();
		return View::Make('backend.fees.feeCollection', compact('classes'));
	}
}

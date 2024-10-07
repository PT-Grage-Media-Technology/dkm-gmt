<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use App\Models\User\User_Detail;
use App\Models\User\User_Address;

class ProfileAccountController extends Controller
{
    public function index() {
        return view('pages.users.settingaccount.profile');
    }
    // public function changeName (Request $request) {
    //     $idUser = Auth::user()->idUser;
    //     $prevName = Auth::user()->UserDetail->name;

    //     $remainChangeName = User_Detail::where('idUser', '=', $idUser)->select('remain_name_change')->first();
    //     if ($remainChangeName->remain_name_change === 0) {
    //         return response()->json(['status' => 'error', 'message' => 'You have reached the name change limit.'], 500);
    //     }


    //     $dataReq = $request->all();
    //     $rulesReq = [
    //         'changeNameUser' => 'required|string|max:255',
    //     ];
    //     $messagesReq = [
    //         'changeNameUser.required' => 'Nama\'s required.',
    //         'changeNameUser.max' => 'Max 255 Character.'
    //     ];
    //     $validator = Validator::make($dataReq, $rulesReq, $messagesReq);


    //     if ($validator->fails()) {
    //         return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    //     }
    //     if ($request->changeNameUser === $prevName) {
    //         return response()->json(['status' => 'error', 'message' => 'Name is the same as the previous one.'], 422);
    //     }


    //     $updateName = User_Detail::where('idUser', '=', $idUser)->update([
    //         'name' => $request->changeNameUser,
    //         'remain_name_change' => $remainChangeName->remain_name_change - 1,
    //     ]);
    //     if ($updateName) {
    //         User::where('idUser', '=', $idUser)->update(['updated_at' => now()]);
    //         return response()->json(['status' => 'success', 'message' => 'Name updated successfully.', 'value' => $request->changeNameUser]);
    //     }

    //     return response()->json(['status' => 'error', 'message' => 'Failed to update name.'], 500);
    // }


    // public function changeGender (Request $request) {
    //     $idUser = Auth::user()->idUser;

    //     $dataReq = $request->all();
    //     $rulesReq = [
    //         'genderUser' => 'required|in:Male,Female,Prefer not to say',
    //     ];
    //     $messagesReq = [
    //         'genderUser.required' => 'Gender is required',
    //         'genderUser.in' => 'Invalid gender selection'
    //     ];
    //     $validator = Validator::make($dataReq, $rulesReq, $messagesReq);


    //     if ($validator->fails()) {
    //         return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    //     }

    //     $updateGender = User_Detail::where('idUser', '=', $idUser)->update([
    //         'gender' => $request->genderUser,
    //     ]);
    //     if ($updateGender) {
    //         User::where('idUser', '=', $idUser)->update(['updated_at' => now()]);
    //         return response()->json(['status' => 'success', 'message' => 'Gender updated successfully.', 'value' => $request->genderUser]);
    //     }

    //     return response()->json(['status' => 'error', 'message' => 'Failed to update gender.'], 500);
    // }

    // public function changeBirth (Request $request) {
    //     $idUser = Auth::user()->idUser;
    //     $prevBirthDate = Auth::user()->UserDetail->birth_date;

    //     $dataReq = $request->all();
    //     $rulesReq = [
    //         'changeBirthUser' => 'nullable|date|before_or_equal:today',
    //     ];
    //     $messagesReq = [
    //         'changeBirthUser.before_or_equal' => 'Date cannot be in the future.'
    //     ];
    //     $validator = Validator::make($dataReq, $rulesReq, $messagesReq);


    //     if ($validator->fails()) {
    //         return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    //     }
    //     if ($request->changeBirthUser === $prevBirthDate) {
    //         return response()->json(['status' => 'error', 'message' => 'Birth date is the same as the previous one.'], 422);
    //     }

    //     $updateBirth = User_Detail::where('idUser', '=', $idUser)->update([
    //         'birth_date' => $request->changeBirthUser,
    //     ]);
    //     if ($updateBirth) {
    //         User::where('idUser', '=', $idUser)->update(['updated_at' => now()]);
    //         return response()->json(['status' => 'success', 'message' => 'Gender updated successfully.', 'value' => $request->changeBirthUser]);
    //     }

    //     return response()->json(['status' => 'error', 'message' => 'Failed to update Birth Date.'], 500);
    // }
    // public function changeTelp (Request $request) {
    //     $idUser = Auth::user()->idUser;
    //     $prevTelp = Auth::user()->UserDetail->telp;

    //     $dataReq = $request->all();
    //     $rulesReq = [
    //         'changeTelpNumberUser' => 'required|digits_between:8,15|max:15',
    //     ];
    //     $messagesReq = [
    //         'changeTelpNumberUser.required' => 'No Telpon required.',
    //         'changeTelpNumberUser.digits_between' => 'No Telpon invalid number.',
    //         'changeTelpNumberUser.max' => 'Max 15 Character.',
    //     ];
    //     $validator = Validator::make($dataReq, $rulesReq, $messagesReq);


    //     if ($validator->fails()) {
    //         return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    //     }
    //     if ($request->changeTelpNumberUser === $prevTelp) {
    //         return response()->json(['status' => 'error', 'message' => 'Telp number is the same as the previous one.'], 422);
    //     }

    //     $updateBirth = User_Detail::where('idUser', '=', $idUser)->update([
    //         'telp' => $request->changeTelpNumberUser,
    //     ]);
    //     if ($updateBirth) {
    //         User::where('idUser', '=', $idUser)->update(['updated_at' => now()]);
    //         return response()->json(['status' => 'success', 'message' => 'Telp number updated successfully.', 'value' => $request->changeTelpNumberUser]);
    //     }

    //     return response()->json(['status' => 'error', 'message' => 'Failed to update Birth Date.'], 500);
    // }
}

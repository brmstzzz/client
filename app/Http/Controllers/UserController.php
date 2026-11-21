<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index(): View
    {
        $send_request = Http::get('http://localhost:8000/api/v1/users');
        $response = $send_request->json();
        $users = $response['data'] ?? [];

        return view('users.index', ['users' => $users]);
    }

    // Menampilkan halaman tambah user
    public function create(): View
    {
        return view('users.create');
    }

    // Menyimpan user baru
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'password'     => 'required|min:6',
            'address'      => 'required',
            'phone_number' => 'required',
            'city'         => 'required',
            'roles'        => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $response = Http::post('http://localhost:8000/api/v1/users', [
            'name'         => $request->input('name'),
            'email'        => $request->input('email'),
            'password'     => $request->input('password'),
            'address'      => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'city'         => $request->input('city'),
            'roles'        => $request->input('roles'),
        ]);

        $responseData = $response->json();

        if ($response->successful() && ($responseData['success'] ?? false) === true) {
            return redirect()->route('users.index')->with([
                'success' => 'Data Berhasil Disimpan!'
            ]);
        }

        return redirect()->back()->withInput()->with([
            'error' => $responseData['message'] ?? 'Data gagal Disimpan!'
        ]);
    }

    // Menampilkan detail user
    public function show(string $id): View|RedirectResponse
    {
        $response = Http::get("http://localhost:8000/api/v1/users/{$id}");
        $responseData = $response->json();

        if ($response->successful() && ($responseData['success'] ?? false) === true) {
            $dt = $responseData['data'];
            return view('users.show', compact('dt'));
        }

        return redirect()->route('users.index')->with([
            'error' => 'Data tidak ditemukan!'
        ]);
    }

    // Menampilkan halaman edit user
    public function edit(string $id): View|RedirectResponse
    {
        $response = Http::get("http://localhost:8000/api/v1/users/{$id}");
        $responseData = $response->json();

        if ($response->successful() && ($responseData['success'] ?? false) === true) {
            $dt = $responseData['data'];
            // Jika file edit kamu bernama users/edit.blade.php, ganti 'users.show' menjadi 'users.edit'
            return view('users.show', compact('dt'));
        }

        return redirect()->route('users.index')->with([
            'error' => 'Data tidak ditemukan!'
        ]);
    }

    // Mengubah data user
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'password'     => 'nullable|min:6',
            'address'      => 'required',
            'phone_number' => 'required',
            'city'         => 'required',
            'roles'        => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name'         => $request->name,
            'email'        => $request->email,
            'address'      => $request->address,
            'phone_number' => $request->phone_number,
            'city'         => $request->city,
            'roles'        => $request->roles,
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $response = Http::patch(
            "http://localhost:8000/api/v1/users/{$id}",
            $data
        );

        $responseData = $response->json();

        if ($response->successful() && ($responseData['success'] ?? false) === true) {
            return redirect()->route('users.index')->with([
                'success' => 'Data Berhasil Diubah!'
            ]);
        }

        return redirect()->back()->withInput()->with([
            'error' => $responseData['message'] ?? 'Data gagal Diubah!'
        ]);
    }

    // Menghapus user
    public function destroy($id): RedirectResponse
    {
        $response = Http::delete(
            "http://localhost:8000/api/v1/users/{$id}"
        );

        $responseData = $response->json();

        if ($response->successful() && ($responseData['success'] ?? false) === true) {
            return redirect()->route('users.index')->with([
                'success' => 'Data Berhasil Dihapus!'
            ]);
        }

        return redirect()->route('users.index')->with([
            'error' => 'Data tidak ditemukan!'
        ]);
    }
}
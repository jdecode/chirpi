<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminClientController extends Controller
{
    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::create($request->validated());

        return redirect()->route('admin.clients.index');
    }

    public function index(): View
    {
        return view('admin.clients.index', ['clients' => Client::all()]);
    }

    public function create(): View
    {
        return view('admin.clients.create');
    }
}

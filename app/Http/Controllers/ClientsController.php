<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest as ClientRequestAlias;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the client resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created cleint resource in storage.
     *
     * @param \App\Http\Requests\ClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequestAlias $request)
    {
        $validated = $request->validated();

        $client = new Client($validated);
        $client->save();

        //save the file with name as the id of the client
        $fileData = $this->storeAvatar($request, $client->id);

        $client->avatar = $fileData['name'];
        $client->avatar_path = $fileData['path'];
        $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validated);
        if (request()->hasFile('avatar')) {
            //validate the image if the image is changed
            request()->validate([
                'avatar' => 'required|dimensions:min_width=100,min_height=100'
            ]);
            $fileData = $this->storeAvatar(\request(), $client->id);
            $client->avatar = $fileData['name'];
            $client->avatar_path = $fileData['path'];
            $client->save();
        }
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        Storage::delete($client->avatar_path); //delete the avatar once the client is deleted
    }

    /**
     *store the image and return the filename to store
     */
    public function storeAvatar($request, $cliendId)
    {
        $extension = $request->file('avatar')->getClientOriginalExtension();
        $fileNameToStore = $cliendId . '.' . $extension;
        $path = $request->file('avatar')->storeAs('clients/avatars', $fileNameToStore);
        return [
            'name' => $fileNameToStore,
            'path' => $path
        ];
    }
}

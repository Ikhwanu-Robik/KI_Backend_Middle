<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    public function index() {
        $agents = Agent::paginate(10);
        // $agents = Agent::latest()->paginate(10);

        return view('index', ['agents' => $agents]);
    }

    public function show(Request $request) {
        $validated = $request->validate([
            'query' => 'required',
            'search_method' => 'required',
        ]);

        $value = "%" . $validated['query'] . "%";

        switch($request->search_method) {
            case 'name':
                $agents = Agent::where('name', 'LIKE', $value)->get();

                return view('show', ['agents' => $agents, 'search_method' => 'Name']);
            case 'description':
                $agents = Agent::where('description', 'LIKE', $value)->get();

                return view('show', ['agents' => $agents, 'search_method' => 'Description']);
            default:
                return response(400);
        }
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
        
        try {
            $image = $request->file('image');

            // $image->storeAs('public/avatars', $imageName);
            //the problem is solved by changing php.ini ;upload_tmp_path = c:\laragon\tmp
            //I dont know why, it just works before
    
            Storage::disk('public')->put('avatars', $image);
            //previously Storage::disk('public')->put('public/avatars', $image);
        }
        catch(\Exception $e) {
            dd($e);
        }

        Agent::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'release_date' => Carbon::now()->setTimezone('Asia/Jakarta')->toDateTime(),
            'image' => $image->hashName(),
        ]);

        return redirect('/create')->with('create_status', 'success');
    }

    public function edit($id) {
        $agentData = Agent::findOrFail($id);

        return view('edit', ['agent' => $agentData]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $agent = Agent::findOrFail($request->id);

        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
        
        $image = $request->file('image');
        try {
            Storage::disk('public')->put('avatars', $image);

            Storage::disk('public')->delete('avatars/'.$agent->image);
        }
        catch(\Exception $e) {
            dd($e);
        }

        $agent->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'release_date' => Carbon::now()->setTimezone('Asia/Jakarta')->toDateTime(),
            'image' => $image->hashName(),
        ]);

        $agent->save();

        return redirect('/edit/'.$request->id)->with('edit_status', 'success');
    }

    public function delete($id) {
        $agentData = Agent::findOrFail($id);

        return view('delete', ['agent' => $agentData]);
    }

    public function destroy($id) {
        Agent::destroy($id);

        return redirect('/');
    }
}

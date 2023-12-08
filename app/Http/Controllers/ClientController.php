<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('index', compact('clients'));

    }

    public function create()
    {
        $governments = $this->getEgyptGovernments();
        return view('create', compact('governments'));
       
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|max:20',
            'government' => ['required', 'max:255', Rule::in($this->getEgyptGovernments())],
            'city' => 'required|max:255',
            'detailed_address' => 'nullable|max:255',
            'notes' => 'nullable',
        ]);

        Client::create($validatedData);

        return redirect()->route('index')->with('success', 'Client added successfully.');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $governments = $this->getEgyptGovernments(); 
        return view('edit', compact('client', 'governments'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|max:20',
            'government' => ['required', 'max:255', Rule::in($this->getEgyptGovernments())],
            'city' => 'required|max:255',
            'detailed_address' => 'nullable|max:255',
            'notes' => 'nullable',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validatedData);

        return redirect()->route('index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('index')->with('success', 'Client deleted successfully.');
    }
    private function getEgyptGovernments()
    {
        return [
            'Beni-Suef',
            'Ad Daqahliyah',
            'Al Bahr al Ahmar',
            'Al Buhayrah',
            'Al Fayyum',
            'Al Gharbiyah',
            'Al Iskandariyah',
            'Al Isma\'iliyah',
            'Al Jizah',
            'Al Minufiyah',
            'Al Minya',
            'Al Qahirah',
            'Al Qalyubiyah',
            'Al Uqsur',
            'Al Wadi al Jadid',
            'As Suways',
            'Ash Sharqiyah',
            'Aswan',
            'Asyut',
            'Bur Sa\'id',
            'Dumyat',
            'Janub Sina\'',
            'Kafr ash Shaykh',
            'Matruh',
            'Qina',
            'Shamal Sina\'',
            'Suhaj',
        ];
    }
}

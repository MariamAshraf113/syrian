
@extends('layouts.app')

@section('content')
    <h2>Clients</h2>
    <a href="{{ route('create') }}" class="btn btn-primary">Add Client</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Government</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->government }}</td>
                    <td>{{ $client->city }}</td>
                    <td>
                        <a href="{{ route('edit', $client->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('destroy', $client->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

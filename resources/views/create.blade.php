
@extends('layouts.app')

@section('content')
    <h2>Add Client</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="mb-3">
            <label for="government" class="form-label">Government</label>
            <select class="form-select" id="government" name="government" required>
                <option value="" disabled selected>Select Government</option>
                @foreach ($governments as $government)
                    <option value="{{ $government }}">{{ $government }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="detailed_address" class="form-label">Detailed Address</label>
            <textarea class="form-control" id="detailed_address" name="detailed_address"></textarea>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
@endsection

<!-- resources/views/clinics/addclinic.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Clinic</title>
    <!-- Add your CSS links or styles here if needed -->
</head>
<body>
    <h1>Add Clinic</h1>
    <!-- Your clinic creation form goes here -->
    <form action="{{ route('clinic.create') }}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}">
            @error('location')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="{{ old('contact') }}">
            @error('contact')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{ old('status') }}">
            @error('status')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

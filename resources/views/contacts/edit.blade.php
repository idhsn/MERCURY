<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f2f2f7; margin: 0; color: #000; }
        .container { max-width: 600px; margin: 0 auto; min-height: 100vh; display: flex; flex-direction: column; }
        
        .nav-bar { display: flex; justify-content: space-between; padding: 15px 20px; background: #f2f2f7; align-items: center; }
        .nav-btn { text-decoration: none; font-size: 17px; color: #007aff; }
        .nav-title { font-weight: 600; font-size: 17px; }
        .nav-btn.bold { font-weight: 600; }
        
        .form-section { background: #fff; border-radius: 10px; margin: 20px; padding: 0 20px; box-shadow: 0 1px 5px rgba(0,0,0,0.05); }
        .input-group { display: flex; align-items: center; border-bottom: 1px solid #c6c6c8; padding: 12px 0; }
        .input-group:last-child { border-bottom: none; }
        
        input, select { flex-grow: 1; border: none; font-size: 17px; outline: none; background: transparent; padding: 5px; }
        
        .avatar-placeholder { width: 100px; height: 100px; background: #8e8e93; border-radius: 50%; margin: 20px auto; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff; }
    </style>
</head>
<body>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="nav-bar">
                <a href="{{ route('contacts.index') }}" class="nav-btn">Cancel</a>
                <span class="nav-title">Edit Contact</span>
                <button type="submit" class="nav-btn bold" style="background:none; border:none; cursor:pointer;">Update</button>
            </div>

            <div class="avatar-placeholder">
                {{ strtoupper(substr($contact->name, 0, 1)) }}
            </div>

            <div class="form-section">
                <div class="input-group">
                    <input type="text" name="name" value="{{ old('name', $contact->name) }}" placeholder="Name" required>
                </div>
                <div class="input-group">
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" placeholder="Phone" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" value="{{ old('email', $contact->email) }}" placeholder="Email">
                </div>
                <div class="input-group">
                    <select name="group_id" required>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{ $contact->group_id == $group->id ? 'selected' : '' }}>
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>New Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f2f2f7; margin: 0; color: #000; }
        .container { max-width: 600px; margin: 0 auto; min-height: 100vh; display: flex; flex-direction: column; }
        
        /* Header */
        .nav-bar { display: flex; justify-content: space-between; padding: 15px 20px; background: #f2f2f7; align-items: center; }
        .nav-btn { text-decoration: none; font-size: 17px; color: #007aff; }
        .nav-title { font-weight: 600; font-size: 17px; }
        .nav-btn.bold { font-weight: 600; }
        
        /* Form Section */
        .form-section { background: #fff; border-radius: 10px; margin: 20px; padding: 0 20px; box-shadow: 0 1px 5px rgba(0,0,0,0.05); }
        .input-group { display: flex; align-items: center; border-bottom: 1px solid #c6c6c8; padding: 12px 0; }
        .input-group:last-child { border-bottom: none; }
        
        input, select { flex-grow: 1; border: none; font-size: 17px; outline: none; background: transparent; padding: 5px; }
        input::placeholder { color: #c4c4c6; }
        
        /* Avatar Placeholder */
        .avatar-placeholder { width: 100px; height: 100px; background: #e3e3e8; border-radius: 50%; margin: 20px auto; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #fff; }
    </style>
</head>
<body>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="nav-bar">
                <a href="{{ route('contacts.index') }}" class="nav-btn">Cancel</a>
                <span class="nav-title">New Contact</span>
                <button type="submit" class="nav-btn bold" style="background:none; border:none; cursor:pointer;">Done</button>
            </div>

            <div class="avatar-placeholder">👤</div>

            <div class="form-section">
                <div class="input-group">
                    <input type="text" name="name" placeholder="First Name" required>
                </div>
                <div class="input-group">
                    <input type="text" name="phone" placeholder="Phone" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                    <select name="group_id" required>
                        <option value="" disabled selected>Select Group</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>

</body>
</html>

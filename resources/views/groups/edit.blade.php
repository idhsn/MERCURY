<!DOCTYPE html>
<html>
<head>
    <title>Edit Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f2f2f7; margin: 0; }
        .container { max-width: 600px; margin: 0 auto; }
        
        .nav-bar { display: flex; justify-content: space-between; padding: 15px 20px; align-items: center; }
        .nav-btn { text-decoration: none; font-size: 17px; color: #007aff; }
        .nav-title { font-weight: 600; font-size: 17px; }
        .nav-btn.bold { font-weight: 600; border: none; background: none; cursor: pointer; color: #007aff; }
        
        .form-section { background: #fff; margin: 20px; border-radius: 10px; padding: 0 20px; }
        .input-group { padding: 15px 0; border-bottom: 1px solid #c6c6c8; }
        .input-group:last-child { border-bottom: none; }
        input, textarea { width: 100%; border: none; font-size: 17px; outline: none; font-family: inherit; }
        textarea { resize: none; height: 60px; }
    </style>
</head>
<body>

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="nav-bar">
                <a href="{{ route('groups.index') }}" class="nav-btn">Cancel</a>
                <span class="nav-title">Edit Group</span>
                <button type="submit" class="nav-btn bold">Update</button>
            </div>

            <div class="form-section">
                <div class="input-group">
                    <input type="text" name="name" value="{{ old('name', $group->name) }}" placeholder="Group Name" required>
                </div>
                <div class="input-group">
                    <textarea name="description" placeholder="Description (Optional)">{{ old('description', $group->description) }}</textarea>
                </div>
            </div>
        </div>
    </form>

</body>
</html>

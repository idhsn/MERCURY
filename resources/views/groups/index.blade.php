<!DOCTYPE html>
<html>
<head>
    <title>Groups</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f2f2f7; margin: 0; color: #000; }
        .container { max-width: 600px; margin: 0 auto; min-height: 100vh; }
        
        .header { padding: 40px 20px 20px 20px; background: #f2f2f7; }
        .top-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        h1 { font-size: 34px; font-weight: 700; margin: 0; }
        .add-btn { color: #007aff; font-size: 28px; text-decoration: none; font-weight: 300; }
        .back-link { display: block; margin-bottom: 10px; color: #007aff; text-decoration: none; font-size: 17px; }

        .group-list { list-style: none; padding: 0 20px; margin: 0; }
        .group-item { background: #fff; padding: 15px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #c6c6c8; }
        .group-item:first-child { border-top-left-radius: 10px; border-top-right-radius: 10px; }
        .group-item:last-child { border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-bottom: none; }
        
        .name { font-size: 17px; font-weight: 500; }
        .actions a { margin-left: 15px; text-decoration: none; font-size: 15px; }
        .edit-btn { color: #007aff; }
        .delete-btn { color: #ff3b30; background: none; border: none; font-size: 15px; cursor: pointer; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <a href="{{ route('contacts.index') }}" class="back-link">← Contacts</a>
            <div class="top-row">
                <h1>Groups</h1>
                <a href="{{ route('groups.create') }}" class="add-btn">+</a>
            </div>
        </div>

        <ul class="group-list">
            @foreach($groups as $group)
                <li class="group-item">
                    <span class="name">{{ $group->name }}</span>
                    <div class="actions">
                        <a href="{{ route('groups.edit', $group->id) }}" class="edit-btn">Edit</a>
                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Delete Group?')">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>

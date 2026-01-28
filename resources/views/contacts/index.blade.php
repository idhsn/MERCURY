<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #f2f2f7; margin: 0; padding: 0; color: #000; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; min-height: 100vh; box-shadow: 0 0 20px rgba(0,0,0,0.05); }
        
        /* Header */
        .header { padding: 40px 20px 10px 20px; background: #fff; position: sticky; top: 0; z-index: 10; }
        .top-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        h1 { font-size: 34px; font-weight: 700; margin: 0; letter-spacing: -0.5px; }
        .add-btn { color: #007aff; font-size: 28px; text-decoration: none; font-weight: 300; }
        
        /* Search Bar */
        .search-container { position: relative; margin-bottom: 10px; }
        .search-box { width: 100%; padding: 10px 15px 10px 35px; background: #e3e3e8; border: none; border-radius: 10px; font-size: 17px; box-sizing: border-box; outline: none; }
        .search-icon { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #8e8e93; font-size: 14px; }
        
        /* List */
        .contact-list { list-style: none; padding: 0; margin: 0; }
        .contact-item { display: flex; align-items: center; padding: 12px 20px; border-bottom: 1px solid #c6c6c8; background: #fff; transition: background 0.2s; }
        .contact-item:last-child { border-bottom: none; }
        .contact-item:active { background: #e5e5ea; }
        
        /* Avatar */
        .avatar { width: 40px; height: 40px; background: linear-gradient(135deg, #8e8e93, #636366); border-radius: 50%; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 18px; margin-right: 15px; }
        
        /* Info */
        .info { flex-grow: 1; }
        .name { font-size: 17px; font-weight: 600; color: #000; display: block; }
        .details { font-size: 14px; color: #8e8e93; margin-top: 2px; }
        
        /* Actions */
        .actions { display: flex; gap: 15px; }
        .action-link { text-decoration: none; font-size: 14px; }
        .edit-link { color: #007aff; }
        .delete-btn { background: none; border: none; color: #ff3b30; font-size: 14px; cursor: pointer; padding: 0; }
        
        /* Success Message */
        .success { background: #34c759; color: white; text-align: center; padding: 10px; font-size: 14px; position: fixed; top: 0; left: 0; right: 0; z-index: 100; animation: fadeOut 3s forwards; }
        @keyframes fadeOut { 0% { opacity: 1; } 80% { opacity: 1; } 100% { opacity: 0; visibility: hidden; } }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="container">
        <div class="header">
            <div class="top-row">
                <a href="{{ route('groups.index') }}" style="color:#007aff; text-decoration:none; font-size:17px;">Groups</a>
                <h1>Contacts</h1>
                <a href="{{ route('contacts.create') }}" class="add-btn">+</a>
            </div>
            <div class="search-container">
                <span class="search-icon">🔍</span>
                <input type="text" id="search" class="search-box" placeholder="Search">
            </div>
        </div>

        <ul class="contact-list" id="contact-list">
            @include('contacts.partials.list')
        </ul>
    </div>


    <script>
    $(document).ready(function(){
        $('#search').on('keyup', function(){
            let searchValue = $(this).val();
            $.ajax({
                url: "{{ route('contacts.search') }}",
                type: "GET",
                data: { 'search': searchValue },
                success: function(response){
                    $('#contact-list').html(response);
                }
            });
        });
    });
    </script>
</body>
</html>

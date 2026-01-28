@forelse($contacts as $contact)
    <li class="contact-item">
        <!-- Generates a circle with the first letter of the name -->
        <div class="avatar">
            {{ strtoupper(substr($contact->name, 0, 1)) }}
        </div>
        
        <div class="info">
            <span class="name">{{ $contact->name }}</span>
            <div class="details">
                {{ $contact->phone }} • {{ $contact->group ? $contact->group->name : 'No Group' }}
            </div>
        </div>
        
        <div class="actions">
            <a href="{{ route('contacts.edit', $contact->id) }}" class="action-link edit-link">Edit</a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-link delete-btn" onclick="return confirm('Delete this contact?')">Delete</button>
            </form>
        </div>
    </li>
@empty
    <li style="text-align: center; padding: 40px; color: #8e8e93;">
        No contacts found.
    </li>
@endforelse

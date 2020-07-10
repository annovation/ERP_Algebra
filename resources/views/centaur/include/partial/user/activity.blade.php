<ul class="list-group">
@forelse ($users as $user)
    <li class="list-group-item">
        <span class="badge">{{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}</span>
        {{ $user->first_name . ' ' .$user->last_name }}
    </li>
@empty
    <li class="list-group-item">Niti jedan korisnik nije se logirao zadnja tri dana</li>
@endforelse
</ul>

<form method="POST" action="{{ $route }}">
    @method('delete')
    @csrf
    <a href="#" class="hover:underline" onclick="event.preventDefault(); this.closest('form').submit();">
        {{ $text }}
    </a>
</form>

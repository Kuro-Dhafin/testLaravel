<form method="POST" action="/services/{{ $s->id }}/order">
@csrf
<button class="btn btn-success">Order</button>
</form>
<div class="mt-3">
    {{ $services->links('pagination::bootstrap-5') }}
</div>
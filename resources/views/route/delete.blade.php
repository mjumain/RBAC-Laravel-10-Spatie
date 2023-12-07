<!-- Modal -->
<div class="modal fade" id="modal-form-delete-{{ $route->id }}" tabindex="-1" aria-hidden="true">
    {{-- <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true"> --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">hapus route ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ Str::upper($route->route) }}</p>
                <form action="{{ route('route.destroy', $route->id) }}" method="post"
                    id="modal-delete-{{ $route->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="modal-footer align-text-center">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <a href="#"
                    onclick="event.preventDefault(); document.getElementById('modal-delete-{{ $route->id }}').submit()"
                    class="btn btn-danger btn-sm">Hapus</a>
            </div>
        </div>
    </div>
</div>

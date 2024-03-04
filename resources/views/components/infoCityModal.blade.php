<!-- Modal -->
<div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="false" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ml-3">
        <h5 class="modal-title " id="exampleModalLabel">{{$tittle}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div>
   

    <!-- Resto de tu código HTML -->
</div>
      <div class="modal-body  ml-3">
      {{$content}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="saveCity" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
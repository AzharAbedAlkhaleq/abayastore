<form action="{{ url('admin/delete-coupon/'.$coupon->id) }}" id="delete_cop" method="POST" enctype="multipart/form-data">
  @csrf
  @method('delete')
  
  
  <div class="modal fade" id="ModalDelete{{ $coupon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style="text-align: center" class="modal-header">
            <h4   class="modal-title" > {{ trans('admin.delete coupon') }}</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
  
          <div class="modal-body">
            {{ trans('admin.Do you sure you want to delete?').$coupon->id }}
            {{-- <b>{{   }}</b>? --}}
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="cancelbtn btn btn-primary">{{ trans('admin.cancel') }}</button>
            <button type="submit" class="btn btn-danger">{{ trans('admin.delete') }} </button>
          </div>
        </div>
      </div>
    </div>
  
  </form>
  <script>
    // Get the modal
    var modal = document.getElementById('id01');
  
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
    
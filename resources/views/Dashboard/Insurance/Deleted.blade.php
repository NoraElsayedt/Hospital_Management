<!-- Deleted insurance -->
<div class="modal fade" id="Deleted{{$insurance->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('insurance.Title_deleted')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Insurance.destroy','test')}}" method="post">
                    @method('DELETE')
                    @csrf

                   
                    <input type="hidden" name="id" value="{{$insurance->id}}">

                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger">{{trans('insurance.Deleted')}}</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Sections.Close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('Sections.submit')}}</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
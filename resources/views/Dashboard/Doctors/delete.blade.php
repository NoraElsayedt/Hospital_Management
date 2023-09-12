<!-- Modal -->
<div class="modal fade" id="delete{{ $Doctors->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Doctors.delete_doctor')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Doctor.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $Doctors->id }}">
                <h5>{{trans('Sections.Warning')}}</h5>

                <input type="hidden" name="page" value=1>
                @if($Doctors->image)
                <input type="hidden" name="filename" value="{{$Doctors->image->filename}}">
                @endif
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Sections.Close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('Sections.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
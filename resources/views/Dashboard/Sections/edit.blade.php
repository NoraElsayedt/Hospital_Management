<!-- Modal -->
<div class="modal fade" id="edit{{ $sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Sections.edit_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Sections.name_sections')}}</label>
                    <input type="hidden" name="id" value="{{ $sections->id }}">
                    <input type="text" name="name" value="{{ $sections->name }}" class="form-control">


                    <label for="exampleInputPassword1">{{trans('Sections.description')}}</label>
                    <input type="text" name="description" value="{{ $sections->description }}" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Sections.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Sections.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
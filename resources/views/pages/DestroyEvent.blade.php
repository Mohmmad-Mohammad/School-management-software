<div class="modal fade" id="delete_event" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('home.destroy','test')}}" method="post" >
            @method('Delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="modal-title" id="exampleModalLabel">رجوع عن مناسبة </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <label for="Grade_id">اخر المناسبات: <span class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2" name="id" >
                        <option selected disabled >{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($ide as $event)
                            <option  value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

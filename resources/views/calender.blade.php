    @extends('layouts.calender')
    @section('content')
        <div class="container" style="padding-top: 100px; padding-bottom: 100px;">

            <div id='calendar'></div>

            <div id="modal-event" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Vehicle Detail</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('_title', 'Model') }}
                                {{ Form::text('_title', old('_title'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_date_start', 'START DATE') }}
                                {{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_time_start', 'START TIME') }}
                                {{ Form::text('_time_start', old('_time_start'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_date_end', 'DATE TIME END') }}
                                {{ Form::text('_date_end', old('_date_end'), ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('_color', 'COLOR') }}
                                <div class="input-group colorpicker">
                                    {{ Form::text('_color', old('_color'), ['class' => 'form-control']) }}
                                    <span class="input-group-addon">
                                        <i></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-dafault" data-dismiss="modal">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

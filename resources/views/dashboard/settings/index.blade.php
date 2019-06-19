@extends('layouts.main')

@section('page')
General Settings
@stop

@section('content')
@include('sweet::alert')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <h2>General Settings</h2>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

            <form id="update_settings" action="{{ route('generalsetting.store') }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('post') }}
                @include('partials._errors')
                <div class="col-md-12">

                    <input id="setting_id" type="hidden" name="id" value="{{ $store_id }}">
                    <div class="form-group">
                        <label>Store Name</label>
                        <input type="text" name="store_name" id="" class="form-control" value="{{ $store_name }}">
                    </div>
                    <div class="form-group">
                        <label>Start Day</label>
                        <input type="date" name="start_day" class="form-control datepicker" data-provide="datepicker"
                            value="{{ $start_day }}">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control image custom-file-input"
                                id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Logo for your Store</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('/uploads/settings/'.$logo) }}" style="width:200px;"
                            class="img-circle img-thumbnail img-preview">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">General Settigs Update</button>
                    </div>

                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>


@stop
@section('script')
<script type="text/javascript">
    /* $(document).ready(function () {
        jQuery.noConflict();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#update_settings').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "/updatesetting/",
                data: $('#update_settings').serialize(),
                success: function (data) {
                    console.log(data);
                    location.reload();

                },
                error: function (error) {
                    console.log(error)
                    const errors = error.responseJSON.errors
                    const firstitem = Object.keys(errors)[0]
                    const firstitemDOM = document.getElementById(firstitem)
                    const firstErrorMessage = errors[firstitem][0]
                    firstitemDOM.scrollIntoView({})

                    const errorMessages = document.querySelectorAll('.text-danger')
                    errorMessages.forEach((element) => element.textContent = '')

                    firstitemDOM.insertAdjacentHTML('afterend',
                        `<div class="text-danger">${firstErrorMessage}</div>`)

                    const formControls = document.querySelectorAll('.form-control')
                    formControls.forEach((element) => element.classList.remove('border',
                        'border-danger'))

                    firstitemDOM.classList.add('border', 'border-danger')
                }
            });
        });
    });*/

</script>


@endsection

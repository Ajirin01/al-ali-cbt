@extends('layouts.admin_layout')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="true">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab2" data-toggle="pill" href="#custom-tabs-five-overlay-dark2" role="tab" aria-controls="custom-tabs-five-overlay-dark2">Add Classes</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="overlay-wrapper">
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Switch between tabs to manage classes</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Classes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="classe-table-body">
                                                @foreach ($classes as $i =>  $classe)
                                                    @php
                                                        $sn =  $i + 1 ;
                                                        // echo $sn;
                                                    @endphp
                                                    <tr id="classe{{$classe->id}}row">
                                                        <td>{{ $i + 1 }}</td>
                                                        {{-- render classe component --}}
                                                    <x-general.noun-area :id="$classe->id" :name="$classe->name" :noun="$noun"/>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Classes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        {{-- Add classes --}}
                        <div class="tab-pane fade show" id="custom-tabs-five-overlay-dark2" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab2">
                            <div class="overlay-wrapper">
                                {{-- add classe component --}}
                                <div style="display: none; text-align: center" class="overlay dark" id="ajax-loader2"><i style="position: fixed; margin-top: 20vh" class="fas fa-3x fa-sync-alt fa-spin"></i></div>
                                <x-general.noun-add :noun="$noun" :key="'name'"/>
                            </div>
                            {{-- /. Add classe --}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function update(id, noun){
            let input = "text" + id + noun

            let data = {
                name: $("#"+input).val()
            }

            updateData(data, id, noun)
        }
    </script>
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div>

            @if ($errors->any())
                <div class="alert alert-danger">

                    {!! implode('', $errors->all('<div>:message</div>')) !!}

                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit project: {{ $project->project_name }} </h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project_update', $project) }}" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4 form-group">
                                    Project name:<input type="text" class="form-control" name="project_name"
                                        value="{{ old('project_name', $project->project_name) }}">
                                </div>
                                <div class="col-4 form-group">
                                    Number of groups: <input type="number" class="form-control" name="group_number"
                                        value="{{ old('group_number', $project->group_number) }}">
                                </div>
                                <div class="col-4 form-group">
                                    Students per group: <input type="number" class="form-control" name="student_number"
                                        value="{{ old('student_number', $project->student_number) }}">
                                </div>

                                <div class="col-12">

                                    <button type="submit" class="btn btn-success mt-2">Update Project</button>
                                </div>
                            </div>
                            @method('PUT')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">

                {!! implode('', $errors->all('<div>:message</div>')) !!}

            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>More about the project: {{ $project->project_name }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center show-content">
                            <div class="col-4 show-content__block">
                                <span>Project:</span>
                                <div>{{ $project->project_name }}</div>
                            </div>
                            <div class="col-4 show-content__block">
                                <span>Number of groups:</span>
                                <div>{{ $project->group_number }}</div>
                            </div>
                            <div class="col-4 show-content__block">
                                <span>Students per group:</span>
                                <div>{{ $project->student_number }}</div>
                            </div>
                        </div>
                        <h2>Students</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Student</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($students as $student)
                                    <tr>
                                        @if ($student->project_id == $project->id)
                                            <th>{{ $student->full_name }}</th>
                                            <td>

                                                <form action="{{ route('student_update', $student->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-4 form-group">
                                                            Assign group:<input type="text" class="form-control"
                                                                name="group" value="{{ $student->group }}">
                                                        </div>

                                                        <div class="col-12">

                                                            <button type="submit"
                                                                class="btn btn-success mt-2 mb-3">Assign</button>
                                                        </div>
                                                    </div>
                                                    @method('PUT')
                                                    @csrf
                                                </form>

                                            </td>
                                            <td>
                                                <form method="post" action="{{ route('student_delete', $student->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </td>

                                    </tr>
                                @endif
                                @endforeach


                            </tbody>
                        </table>
                        <form action="{{ route('student_store') }}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4 form-group">
                                    Student's full name:<input type="text" class="form-control" name="full_name"
                                        value="{{ old('full_name') }}">
                                </div>

                                <div class="col-4 form-group">
                                    <input type="hidden" class="form-control" name="project_id"
                                        value="{{ $project->id }}">
                                </div>

                                <div class="col-12">

                                    <button type="submit" class="btn btn-success mt-2 mb-3">Add student</button>
                                </div>
                            </div>
                            @csrf
                        </form>
                        @for ($i = 1; $i < $project->group_number + 1; $i++)
                            <div class="card">
                                <div class="card-header">
                                    Group #{{ $i }}
                                </div>
                                <div class="card-body">
                                    <?php $count = 0; ?>
                                    @foreach ($students as $student)
                                        @if ($student->group == $i && $project->id == $student->project_id)
                                            <div>{{ $student->full_name }}
                                                <?php $count++; ?>
                                            </div>
                                        @endif
                                    @endforeach
                                    <?php
                                    if ($count == $project->student_number) {
                                        echo '<h3> Group ' . $i . ' is now full.</h3>';
                                    } elseif ($count > $project->student_number) {
                                        echo '<h3> Group ' . $i . ' is over capacity. The group can only have ' . $project->student_number . ' students</h3>';
                                    }
                                    
                                    ?>

                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

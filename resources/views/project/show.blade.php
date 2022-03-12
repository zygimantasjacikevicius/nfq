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
                        <h1>More about the project: : {{ $project->project_name }}</h1>
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
                                        <th>{{ $student->full_name }}</th>
                                        <td> - </td>
                                        <td>
                                            <form method="post" action="{{ route('student_delete', $student->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <form action="{{ route('student_store') }}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4 form-group">
                                    Student's full name:<input type="text" class="form-control" name="full_name"
                                        value="{{ old('full_name') }}">
                                </div>

                                <div class="col-12">

                                    <button type="submit" class="btn btn-success mt-2">Add student</button>
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
                                    @for ($j = 0; $j < $project->student_number; $j++)
                                        <form action="{{ route('project_show', $project) }}" method="GET">
                                            <div class="form-group">

                                                <select name="student" class="form-control">
                                                    <option value="0">Assign Student</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">
                                                            {{ $student->name }} {{ $student->surname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-info m-1">Assign to group</button>

                                        </form>
                                    @endfor


                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

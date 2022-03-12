@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>All active projects</h1>

                <a href="{{ route('project_create') }}" class="btn btn-info m-2">Create new project</a>
                <div class="card-body">
                    <div class="container">
                        @forelse ($projects as $project)
                            <div class="row justify-content-center">

                                <div class="col-12">
                                    <div class="index-list">
                                        <div class="index-list__extra">
                                            {{ $project->project_name }}
                                        </div>
                                        <div class="index-list__content">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Number of groups:</b> {{ $project->group_number }}
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Number of students in each group:</b>
                                                    {{ $project->student_number }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="index-list__buttons">
                                            <a href="#" class="btn btn-success m-2">EDIT</a>
                                            <button type="submit" class="delete--button btn btn-danger m-2"
                                                data-action="#">DELETE</button>
                                            <a href="#" class="btn btn-info m-2">Assign
                                                students</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @empty
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="index-list">
                                        <div class="index-list__extra">
                                            No projects
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>






            </div>
        </div>
    </div>
@endsection

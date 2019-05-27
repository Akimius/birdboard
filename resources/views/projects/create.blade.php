@extends('layouts.app')

@section('content')

    <form method="POST" action="/projects">
        @csrf
        <div class="container mt-6">
            <h1 class="title">
                Create Project
            </h1>

            <p class="subtitle">
                My first website with <strong>Bulma</strong>!
            </p>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Title</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="e.g. Enter Title here">
                        </div>
                        {{--<p class="help is-danger">This field is required</p>--}}
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Description</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary">
                                Create a project
                            </button>
                            <a href="/projects" class="button is-text">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">content</th>
                                <th scope="col">user_id</th>
                                <th scope="col">handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <th scope="row">{{ $comment->id }}</th>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->user_id }}</td>
                                    <td>
{{--                                        @can('update', $comment)--}}
{{--                                            <a href="{{ route('comment.edit', $comment->id) }}">edit</a>--}}
{{--                                        @endcan--}}
                                        @cannot('update', $comment)
                                            ko co quyen
                                        @elsecannot('create', App\Models\Comment::class)
                                            ko co quyen tao
                                        @endcannot
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
